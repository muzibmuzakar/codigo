@extends('layouts.main')

@section('main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.1/dist/css/uikit.min.css" />


<section class="pembelajaran">
    <div class="container-fluid">
        <div class="belajar">
            <div class="section-title">
                <h2>Materi</h2>
                <h3 class="text-center">{{ $materi->judul }}</h3>
                <p>{{ $materi->detail }}</p>
            </div>
            <div class="box-materi">
                {{-- slideshow --}}
                <div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="animation: pull;">

                    <ul class="uk-slideshow-items d-none" uk-lightbox="animation: scale">
                        @if (count($materi->slide)>0)
                        @foreach ($materi->slide as $img)
                        <li>
                            {{-- <div class="uk-position-cover"> --}}
                            <a href="/slide/{{ $img->slide }}" id="uk-slid" uk-cover>
                                <img src="/slide/{{ $img->slide }}" alt="">
                            </a>
                                    {{-- </div> --}}
                        </li>
                                    
                        @endforeach
                        @endif
                    </ul>
                          
                </div>
            </div>

            {{-- menu belajar --}}
            <section id="featured-services" class="featured-services">
                <div class="container" data-aos="fade-up">
          
                  <div class="row">
                    <a  onclick="document.getElementById('uk-slid').click()">
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                <div class="icon"><i class="bx bx-slideshow"></i></div>
                                <h4 class="title">Slide Materi</h4>
                            </div>
                        </div>
                    </a>
          
                    @if ($materi->video)
                    <div uk-lightbox>
                        <a href="{{ $materi->video }}" data-attrs="width: 1000;">
                            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                                <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                                    <div class="icon"><i class="bx bxs-videos"></i></div>
                                    <h4 class="title">Materi Video</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    @else
                        
                    @endif
                    
                    @if ($materi->game)
                    {{-- <div uk-lightbox> --}}
                        {{-- <a href="{{ url('http://localhost/game-ta/'. $materi->game) }}" data-type="iframe"> --}}
                        <a href="{{ route('game.'.$materi->game,$materi->id) }}">
                            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                                <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                                    <div class="icon"><i class="bx bx-joystick-button"></i></div>
                                    <h4 class="title">Game</h4>
                                </div>
                            </div>
                        </a>
                    {{-- </div> --}}
                    @else
                        
                    @endif
                    
                    {{-- @if ($materi->quiz) --}}
                    {{-- <div uk-lightbox> --}}
                        <a href="{{ route('belajar.quiz',$materi->id) }}">
                            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                                <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                                    <div class="icon"><i class='bx bx-list-check'></i></div>
                                    <h4 class="title">Quiz</h4>
                                </div>
                            </div>
                        </a>
                    {{-- </div> --}}
                    {{-- @else --}}
                        
                    {{-- @endif --}}
          
                  </div>
          
                </div>
              </section>
        </div>
    </div>

    {{-- modal materi video --}}
    <div id="modal-media-youtube" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">
            <button class="uk-modal-close-outside" type="button" uk-close></button>
            <iframe src="https://www.youtube-nocookie.com/embed/c2pz2mlSfXA" width="1920" height="1080" frameborder="0" uk-video uk-responsive></iframe>
        </div>
    </div>
</section>

<style>
    @media(max-width:786px){
        .belajar{
            margin-top:40px;
        }
        .belajar h3{
            font-size: 20px;
        }
    }
    @media(min-width:786px){
        .belajar{
            margin-top:50px;
        }
    }
</style>

<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.35/js/uikit.js'></script>
<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.7.1/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.7.1/dist/js/uikit-icons.min.js"></script>
@endsection