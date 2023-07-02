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
            <img src="{{url('/image/banner.png')}}" width="100%" height="260px" alt="" srcset="">
            <div class="container">
                <div class="carousel-caption text-start">
                    <h1 class="crsl-text">TEMUKAN BARANG BERHARGA ANDA</h1>
                    <p class="crsl-text">Menawarkan berbagai barang yang layak pakai dan terjangkau</p>
                    <p><a class="btn btn-lg btn-primary" href="../login-page">Gabung bersama kami</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{url('/image/banner2.png')}}" width="100%" height="260px" alt="" srcset="">
            <div class="container">
                <div class="carousel-caption">
                    <h1 class="crsl-text2">SERBA SERBI BARANG RUMAHAN</h1>
                    <p class="crsl-text2">Situs jual beli online barang baru dan bekas yang mudah dan aman.</p>
                    <p><br></p>
                </div>
            </div>
        </div>
      <div class="carousel-item">
        <img src="{{url('/image/banner3.png')}}" width="100%" height="260px" alt="" srcset="">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1 class="crsl-text">JADILAH SELLER BABELAK</h1>
            <p class="crsl-text">Jangkau seluruh pelanggan setiap harinya</p>
            <p><br></p>
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
                @if (isset($barang))
                    @foreach ($barang as $item)
                    @php
                        $item->gambar = explode('|',$item->gambar)
                    @endphp
                    <div class="col">
                        <div class="card shadow-sm">
                            <a href="/barang/{{$item->id}}"><img width="100%" height="100%" src="{{$item->gambar[0]}}" alt="barang"></a>
                            <div class="card-body">
                                <h6>{{$item->nama_barang}}</h6>
                                <small><i class="fa-solid fa-location-dot"></i> {{$item->alamat->kota}}</small>
                                <h5 class="text-end alig">{{"Rp " . number_format($item->harga, 0, ',', '.')}}</h5>
                                {{-- <p class="text-end" style="text-decoration: line-through;">Rp 100.000</p> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            <div style="display: flex; justify-content: center;">
                <div class="pagination-container"><br><br><br>
                    <ul class="pagination pagination-lg"> <!-- Tambahkan kelas "pagination-lg" untuk ukuran yang lebih besar -->
                        <!-- Link sebelumnya -->
                        @if ($barang->onFirstPage())
                            <li class="disabled"><span><i class="fas fa-angle-double-left"></i></span></li> <!-- Gunakan ikon "fa-angle-double-left" dari Font Awesome -->
                        @else
                            <li><a href="{{ $barang->previousPageUrl() }}" rel="prev"><i class="fas fa-angle-double-left"></i></a></li>
                        @endif
                
                        <!-- Link-link halaman -->
                        @foreach ($barang as $page)
                            @if ($page->url)
                                <li class="{{ $page->isActive ? 'active' : '' }}">
                                    <a href="{{ $page->url }}">{{ $page->label }}</a>
                                </li>
                            @else
                                <li class="disabled"><span>{{ $page->label }}</span></li>
                            @endif
                        @endforeach
                        
                        <!-- Link selanjutnya --> 
                        @if ($barang->hasMorePages())
                            <li><a href="{{ $barang->nextPageUrl() }}" rel="next"><i class="fas fa-angle-double-right"></i></a></li> <!-- Gunakan ikon "fa-angle-double-right" dari Font Awesome -->
                        @else
                            <li class="disabled"><span><i class="fas fa-angle-double-right"></i></span></li>
                        @endif
                    </ul>
                </div>
            </div>
            
        </div>
    </div>

@endsection