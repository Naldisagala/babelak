<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    protected $table = 'courier';

    // starter : jne, tiki, pos
    protected $fillable = [
        'id_product',
        'code',
        'name',
        'service',
        'description',
        'cost_value',
        'cost_etd',
        'note',
    ];

    public function product()
    {
        return $this->belongsTo(Barang::class, 'id_product', 'id');
    }

    public static function typeCourier()
    {
        return [
        [
            'code' => 'jne',
            "name" => "Jalur Nugraha Ekakurir (JNE)",
        ], 
        [
            'code' => 'tiki',
            "name" => "Citra Van Titipan Kilat (TIKI)",
        ], 
        [
            'code' => 'pos',
            "name"=> "POS Indonesia (POS)",
        ]
        ];
    }

    public static function getOngkir($origin, $destination, $weight, $courier){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: ".env('API_KEY', '')
        ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return ['data' => $err];
        } else {
            $response=json_decode($response,true);
            if(!empty($response['rajaongkir']['results'])){
                $data_ongkir = $response['rajaongkir']['results'];
            }else{
                $data_ongkir = $response['rajaongkir']['status'];
            }
            return ['data' => $data_ongkir];
        }
    }

    public static function getProvince($id = null)
    {
        $curl = curl_init();
        $url  = "https://api.rajaongkir.com/starter/province";
        if(!empty($id)){
            $url .= "?id=$id";
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: ".env('API_KEY', '')
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return ['data' => $err];
        } else {
            $response=json_decode($response,true);
            if(!empty($response['rajaongkir']['results'])){
                $data_ongkir = $response['rajaongkir']['results'];
            }else{
                $data_ongkir = $response['rajaongkir']['status'];
            }
            return ['data' => $data_ongkir];
        }
    }

    public static function getCity($id_province, $id_city = null)
    {
        $curl = curl_init();
        $url = "https://api.rajaongkir.com/starter/city?province=$id_province";
        if(!empty($id_city)){
            $url .= "&id=$id_city";
        }
        

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: ".env('API_KEY', '')
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return ['data' => $err];
        } else {
            $response=json_decode($response,true);
            if(!empty($response['rajaongkir']['results'])){
                $data_ongkir = $response['rajaongkir']['results'];
            }else{
                $data_ongkir = $response['rajaongkir']['status'];
            }
            return ['data' => $data_ongkir];
        }
    }

    public static function getListCourier($province, $city, $weight = 1700)
    {
        $province = ucwords(strtolower(urldecode($province)));
        $city     = ucwords(strtolower(urldecode($city)));
        
        $listProvince   = self::getProvince();
        $filterProvince = array_filter($listProvince['data'], function($prov) use($province){
            return ($prov['province'] == $province);
        });
        $singleProvince = reset($filterProvince);
        $provinceId     = $singleProvince['province_id'];
        
        $listCity   = self::getCity($provinceId);
        $filterCity = array_filter($listCity['data'], function($ct) use($city){
            $type       = $ct['type'];
            $city_name  = $ct['city_name'];
            $exp_city   = explode(' ', $city);
            $city_start = $exp_city[0];
            $city_end   = join(' ', array_slice($exp_city, 1, count($exp_city)));

            return (str_contains($type, $city_start) && str_contains($city_end, $city_name));
        });
        $singleCity = reset($filterCity);
        $cityId     = $singleCity['city_id'];
        $listCourier = [];
        $typeCourir = self::typeCourier();
        foreach($typeCourir as $courier){
            $listOngkir = self::getOngkir($cityId, $cityId, $weight, $courier['code']);
            if(is_array($listOngkir['data'])){
                foreach($listOngkir['data'] as $ong){
                    if(!empty($ong['costs'])){
                        foreach($ong['costs'] as $c1){
                            if(!empty($c1['cost'])){
                                foreach($c1['cost'] as $c2){
                                    $listCourier[] = [
                                        'code'        => $ong['code'],
                                        'name'        => $ong['name'],
                                        'service'     => $c1['service'],
                                        'description' => $c1['description'],
                                        'cost_value'  => $c2['value'],
                                        'cost_etd'    => $c2['etd'],
                                        'note'        => $c2['note'],
                                    ];
                                }
                            }
                        }
                    }
                }
            }
        }
        return $listCourier;
    }
}
