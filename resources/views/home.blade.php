@extends('layouts.main')

@section('main')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
      <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1>Welcome to <span>Codigo</span>
        </h1>
        <div class="d-flex">
          <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
      </div>
    </section><!-- End Hero -->

  
      <!-- ======= Services Section ======= -->
    <section id="pelajaran" class="services">
      <div class="container" data-aos="fade-up">
  
        <div class="section-title">
          <h2>Pelajaran</h2>
          <h3>Daftar <span>Pelajaran</span></h3>
            <p>Berikut adalah daftar pelajaran yang saat ini tersedia.</p>
        </div>

        <div class="row">  
          @foreach ($pelajaran as $p)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon">
                @if($p->image)
                  <img src="{{ url('/image/'.$p->image) }}"style="width: 100%; border-radius:10px;" />
                @else
                  <img src="{{ asset('img/default-06.png')}}"style="width: 100%; border-radius:10px;" />
                @endif
                {{-- <img src="{{ url('/image/'.$p->image) }}" style="width: 100%; border-radius:10px;" alt=""> --}}
              </div>
              <h4><a href="{{ route('pelajaranDetail',$p->id) }}">{{ $p->name }}</a></h4>
                <p>{{ $p->detail }}</p>
            </div>
          </div>
          @endforeach
        </div>
  
      </div>
    </section><!-- End Services Section -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>About</h2>
            <h3>Find Out More <span>About Us</span></h3>
          </div>
  
          <div class="row">
            <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="100">
              <img src="assets-frontend/img/about.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
              <p>
                Codigo adalah tempat bagi yang ingin belajar Pemrograman WEB khususnya dalam coding HTML, CSS, JavaScript, dan lain-lain.
              </p>
            </div>
          </div>
  
        </div>
    </section><!-- End About Section -->
  
      <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">
  
          <div class="row">
  
            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="icofont-simple-smile"></i>
                <span data-toggle="counter-up">232</span>
                <p>Happy Clients</p>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
              <div class="count-box">
                <i class="icofont-document-folder"></i>
                <span data-toggle="counter-up">521</span>
                <p>Projects</p>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
              <div class="count-box">
                <i class="icofont-live-support"></i>
                <span data-toggle="counter-up">1,463</span>
                <p>Hours Of Support</p>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
              <div class="count-box">
                <i class="icofont-users-alt-5"></i>
                <span data-toggle="counter-up">15</span>
                <p>Hard Workers</p>
              </div>
            </div>
  
          </div>
  
        </div>
    </section><!-- End Counts Section -->

    <style>
      .icon-box p{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
      }
    </style>
@endsection