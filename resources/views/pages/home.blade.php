<!-- Menghubungkan dengan view template master -->
@extends('../main')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Home')
 
 
<!-- isi bagian konten -->
@section('content')
 
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{url('/image/barang.jpg')}}" width="100%" height="260px" alt="" srcset="">
            <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Example headline.</h1>
                    <p>Some representative placeholder content for the first slide of the carousel.</p>
                    <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{url('/image/barang.jpg')}}" width="100%" height="260px" alt="" srcset="">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Some representative placeholder content for the second slide of the carousel.</p>
                    <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                </div>
            </div>
        </div>
      <div class="carousel-item">
        <img src="{{url('/image/barang.jpg')}}" width="100%" height="260px" alt="" srcset="">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>One more for good measure.</h1>
            <p>Some representative placeholder content for the third slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  </div>


    
    
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
        <div class="row row-cols-1 row-cols-md-5 g-5">
            <div class="col">
            <div class="card shadow-sm">
                <a href="/barang"><img width="100%" height="100%" src="{{url('/image/kipas_angin.jpg')}}" alt="kipas"></a>
                <div class="card-body">
                <h6>Kipas Angin Miyako</h6>
                <small><i class="fa-solid fa-location-dot"></i> Medan Timur</small>
                <h5 class="text-end alig">Rp 100.000</h5> 
                <p class="text-end" style="text-decoration: line-through;">Rp 100.000</p>                  
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card shadow-sm">
                <a href="/barang">  <img width="100%" height="100%" src="{{url('/image/kipas_angin.jpg')}}" alt=""></a>
                <div class="card-body">
                <h6>Kipas Angin Miyako</h6>
                <small><i class="fa-solid fa-location-dot"></i> Medan Timur</small>
                <h5 class="text-end alig">Rp 100.000</h5> 
                <p class="text-end" style="text-decoration: line-through;">Rp 100.000</p>                  
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card shadow-sm">
                <a href="/barang">  <img width="100%" height="100%" src="{{url('/image/kipas_angin.jpg')}}" alt=""></a>
                <div class="card-body">
                <h6>Kipas Angin Miyako</h6>
                <small><i class="fa-solid fa-location-dot"></i> Medan Timur</small>
                <h5 class="text-end alig">Rp 100.000</h5> 
                <p class="text-end" style="text-decoration: line-through;">Rp 100.000</p>                  
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card shadow-sm">
                <a href="/barang">  <img width="100%" height="100%" src="{{url('/image/kipas_angin.jpg')}}" alt=""></a>
                <div class="card-body">
                <h6>Kipas Angin Miyako</h6>
                <small><i class="fa-solid fa-location-dot"></i> Medan Timur</small>
                <h5 class="text-end alig">Rp 100.000</h5> 
                <p class="text-end" style="text-decoration: line-through;">Rp 100.000</p>                  
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card shadow-sm">
                <a href="/barang">  <img width="100%" height="100%" src="{{url('/image/kipas_angin.jpg')}}" alt=""></a>
                <div class="card-body">
                <h6>Kipas Angin Miyako</h6>
                <small><i class="fa-solid fa-location-dot"></i> Medan Timur</small>
                <h5 class="text-end alig">Rp 100.000</h5> 
                <p class="text-end" style="text-decoration: line-through;">Rp 100.000</p>                  
                </div>
            </div>
            </div>

            <div class="col">
            <div class="card shadow-sm">
                <a href="/barang">  <img width="100%" height="100%" src="{{url('/image/kipas_angin.jpg')}}" alt=""></a>
                <div class="card-body">
                <h6>Kipas Angin Miyako</h6>
                <small><i class="fa-solid fa-location-dot"></i> Medan Timur</small>
                <h5 class="text-end alig">Rp 100.000</h5> 
                <p class="text-end" style="text-decoration: line-through;">Rp 100.000</p>                  
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card shadow-sm">
                <a href="/barang">  <img width="100%" height="100%" src="{{url('/image/kipas_angin.jpg')}}" alt=""></a>
                <div class="card-body">
                <h6>Kipas Angin Miyako</h6>
                <small><i class="fa-solid fa-location-dot"></i> Medan Timur</small>
                <h5 class="text-end alig">Rp 100.000</h5> 
                <p class="text-end" style="text-decoration: line-through;">Rp 100.000</p>                  
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card shadow-sm">
                <a href="/barang">  <img width="100%" height="100%" src="{{url('/image/kipas_angin.jpg')}}" alt=""></a>
                <div class="card-body">
                <h6>Kipas Angin Miyako</h6>
                <small><i class="fa-solid fa-location-dot"></i> Medan Timur</small>
                <h5 class="text-end alig">Rp 100.000</h5> 
                <p class="text-end" style="text-decoration: line-through;">Rp 100.000</p>                  
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card shadow-sm">
                <a href="/barang">  <img width="100%" height="100%" src="{{url('/image/kipas_angin.jpg')}}" alt=""></a>
                <div class="card-body">
                <h6>Kipas Angin Miyako</h6>
                <small><i class="fa-solid fa-location-dot"></i> Medan Timur</small>
                <h5 class="text-end alig">Rp 100.000</h5> 
                <p class="text-end" style="text-decoration: line-through;">Rp 100.000</p>                  
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card shadow-sm">
                <a href="/barang">  <img width="100%" height="100%" src="{{url('/image/kipas_angin.jpg')}}" alt=""></a>
                <div class="card-body">
                <h6>Kipas Angin Miyako</h6>
                <small><i class="fa-solid fa-location-dot"></i> Medan Timur</small>
                <h5 class="text-end alig">Rp 100.000</h5> 
                <p class="text-end" style="text-decoration: line-through;">Rp 100.000</p>                  
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
 
@endsection