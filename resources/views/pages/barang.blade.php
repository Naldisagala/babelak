<!-- Menghubungkan dengan view template master -->
@extends('../main')
 
<!-- isi bagian judul halaman -->
@section('title', 'Barang')
 
 
<!-- isi bagian konten -->
@section('content')

{{-- <section class="container sproduct">
    <div class="row mt-5">
        <div class="col-lg-5 col-md-12 col-12">
            <img class="img-fluid w-100 pb-1" src="{{url('/image/bangku_kecil.jpeg')}}" alt="gambar produk">
        
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="{{url('/image/bangku_kecil.jpeg')}}" width="100%" class="small-img" alt="">  
                </div>
                <div class="small-img-col">
                    <img src="{{url('/image/bangku_kecil.jpeg')}}" width="100%" class="small-img" alt="">  
                </div>
                <div class="small-img-col">
                    <img src="{{url('/image/bangku_kecil.jpeg')}}" width="100%" class="small-img" alt="">  
                </div>
                <div class="small-img-col">
                    <img src="{{url('/image/bangku_kecil.jpeg')}}" width="100%" class="small-img" alt="">  
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-12">
            <h3 class="py-4">Bangku kecil Unik</h3>
            <h2>Rp.45.000</h2>
            <button class="btn btn-danger buy-btn">Masukkan Keranjang</button>
            <h4 class="mt-4">Product Details</h4>
            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi 
                aspernatur sint asperiores? Ut, minus aperiam, deserunt vero praesent
                ium voluptatem voluptatum molestiae dolor earum ex impedit totam volu
                ptate blanditiis, eaque sit? natur sint asperiores? Ut, minus aperiam, deserunt vero praesent
                ium voluptatem voluptatum molestiae do

            </span>
        
        </div>
    </div>
</section>  --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <img class="img-barang" src="{{url('/image/bangku_kecil.jpeg')}}" style="max-width: 350px">
                    </div>
                    <div class="col-2"></div>
                    <div class="col-6">
                        <h2><b>Nama Barang <br> <small>Rp 000.000.000</small></b></h2>
                        <br><br>
                        <p><i class="fa fa-check"></i> <b>Tingkat Pemakaian</b> <br> <small>Ada 3 tingkatan surga</small></p>
                        <p><i class="fa fa-location-dot"></i> <b>Tingkat Pemakaian</b> <br> <small>Ada 3 tingkatan surga</small></p>
                        <p><i class="fa fa-credit-card"></i> <b>Tingkat Pemakaian</b> <br> <small>Ada 3 tingkatan surga</small></p>
                        <div class="">
                            <button class="btn btn-default" style="background: #C65299!important;color:white;width:200px">Beli</button>
                            <button class="btn btn-default" style="background: #C65299!important;color:white"><i class="fa-solid fa-cart-shopping"></i></button>
                        </div>
                    </div>
                </div>

            </div>
          </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title"><b>Deskripsi Barang</b></h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><b><img src="{{url('/image/bangku_kecil.jpeg')}}" class="barang-img-profile" alt="" srcset=""> Nama Penjual</b></h5>
                <div class="chat-area-barang">
                    
                </div>
            </div>
          </div>
    </div>
</div>

@endsection