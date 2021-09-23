@extends('layouts.main')

@section('main')
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/css/uikit.min.css'>

<section class="pelajaran">

  <div class="container">
    <div class="card-materi">
      <article class="materi">
        <div class="materi-box">
          <img src="{{ url('/image/'.$pelajaran->image) }}" width="1500" height="1368" alt="">
        </div>
        <div class="materi-content">
          <h2 class="materi-title mb-3">{{ $pelajaran->name }}</h2>
  
          <p class="materi-desc text-break">{{ $pelajaran->detail }}</p>
        </div>
      </article>
    </div>
    
    <div class="section-title" style="margin-bottom: -40px;">
      <h3>Daftar <span>Materi</span> {{ $pelajaran->name }}</h3>
      <hr class="" style="border: 1px solid #8f8f8f; width:350px; margin:auto;">
    </div>

    <div class="uk-container uk-padding">
      <div class="uk-timeline">
        @if ($materi->isEmpty())
          <div class="uk-alert-danger" uk-alert>
            <p>Materi pada pelajaran {{ $pelajaran->name }} belum tersedia.</p>
          </div>
        @else
        @foreach ($materi as $m)
        <div class="uk-timeline-item">
            <div class="uk-timeline-icon">
                <a class="btn-play"href=""><span class="uk-badge"><span uk-icon="play"></span></span></a>
            </div>
            <div class="uk-timeline-content">
                <div class="uk-card uk-card-default uk-margin-medium-bottom uk-overflow-auto">
                    <div class="uk-card-header">
                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                            <h3 class="uk-card-title"><time datetime="2020-07-08">{{ $m->judul }}</time></h3>
                        </div>
                    </div>
                    <div class="uk-card-body">
                      <p class="uk-text">{{ $m->detail }}</p>
                      <a class="uk-button uk-button-primary uk-button-small uk-position-bottom-right" href="{{ route('belajar',$m->id) }}">Mulai Belajar</a>
                    </div>
                </div>
            </div>
        </div>
            
        @endforeach
            
        @endif
      </div>
    </div>
  </div>
</section>

<style>
  body{
    background-color: #f2f2f2;
  }
  .card-materi{
    margin-top: 20px;
    margin-bottom: 50px;
  }
  .materi,
  .materi-box {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15);
    background-color: #fff;
  }

  .materi-box {
    flex: 3 1 30ch;
    height: calc(202px + 5vw);
    overflow: hidden;
  }
  .materi-box img {
    max-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    -o-object-fit: cover;
        object-fit: cover;
    -o-object-position: 50% 50%;
        object-position: 50% 50%;
  }
  .materi {
    border: 2px solid #F2F2F2;
    border-radius: 8px;
    overflow: hidden;
  }
  .materi-content {
    padding: 16px 32px;
    flex: 4 1 40ch;
  }
  .materi-metadata {
    margin: 0;
  }
  .materi-votes {
    font-size: 0.825em;
    font-style: italic;
    color: var(--lightgrey);
  }
  
  @media(max-width:782px){
    .materi-box img {
      margin-top : -60px;
    }
    .name-pelajaran{
      padding-top: 20px;
    }
  }
  @media(min-width:782px){
    .materi-box img {
      margin-top : -100px;
    }
    .name-pelajaran{
      padding-top: 20px;
    }
    .card-materi{
      margin-top: 50px;
    }
  }

  .uk-timeline .uk-timeline-item .uk-card {
	  max-height: 300px;
  }

  .uk-timeline .uk-timeline-item {
    display: flex;
    position: relative;
  }

  .uk-timeline .uk-timeline-item::before {
    background: #dadee4;
    content: "";
    height: 100%;
    left: 19px;
    position: absolute;
    top: 20px;
    width: 2px;
		z-index: -1;
  }

  .uk-timeline .uk-timeline-item .uk-timeline-icon .uk-badge {
		margin-top: 20px;
    width: 40px;
    height: 40px;
  }
  .uk-timeline .uk-timeline-item .uk-timeline-icon :hover {
		transform: scale(1.2);
  }

  .uk-timeline .uk-timeline-item .uk-timeline-content {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 0 0 0 1rem;
  }
</style>

<script src='https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/js/uikit.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/js/uikit-icons.min.js'></script>
@endsection