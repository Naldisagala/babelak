<!-- Menghubungkan dengan view template master -->
@extends('../main')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Keranjang')
 
 
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
 
<h2><b>Keranjang Belanja</b></h2>
<br>
<div class="row">
    <div class="col-6">
        <div class="row mb-3">
            <div class="card bg-white" style="border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-body">
                    <div>
                        <form action="">
                            <input type="checkbox" class="form-input" name="" id="">
                            Pilih semua
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($keranjang as $item)
        <div class="row mb-3">
            <div class="card bg-white" style="border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between;">
                        <div style="display: flex; align-items: center;">
                            <input type="checkbox" class="form-input" name="barangToko" value="" id="">
                            <label for="barangToko"><b>{{$item->nama_toko}}</b></label>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <span>{{$item->kota}}</span>
                        </div>
                    </div>                    
                    <hr style="background: grey">
                    @foreach ($item->list_barang as $items)
                    @php
                        $gambar = explode('|',$items->barang->gambar);
                        dd($items)
                    @endphp
                    <div style="display: flex; justify-content: space-between;">
                        <div style="display: flex; align-items: center;">
                            <input type="checkbox" class="form-input" name="barangToko" value="" id="">
                            <img src="{{$gambar[0]}}" width="100px" alt="" srcset="">
                            <div style="margin-left: 10px">
                                <b>{{$items->barang->nama_barang}}</b><br>
                                @if ($items->id_tawar !='')
                                <span style="text-decoration: line-through; color: red;">Harga: {{$items->barang->harga}}</span>
                                <span style="font-weight: bold; color: green;"> {{$items->harga_akhir}}</span>
                                @else
                                <span style="font-weight: bold;> {{$items->harga_akhir}}</span>
                                @endif
                                
                            </div>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <span>{{$item->kota}}</span>
                        </div>
                    </div>  
                    @endforeach
                    @php
                        // dd($item)
                    @endphp
                       
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-6">
        <div class="card bg-white" style="border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px;">
            <div class="card-body">
                harga
            </div>
        </div>
    </div>
</div>

 
@endsection