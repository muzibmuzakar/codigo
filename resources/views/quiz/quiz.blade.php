@extends('layouts.main')

@section('main')
<!-- UIkit CSS -->
<link rel="stylesheet" href="{{ asset('assets-frontend/css/quiz.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/css/uikit.min.css" />

    <!-- ======= Quis Section ======= -->
    <section id="quiz">
      <div class="container">
        <div class="section-title">
          <h2>Quiz</h2>
          <h3 class="text-center">{{ $materi->judul }}</h3>

          <a class="btn btn-outline-primary" href="{{ route('quiz.game',$materi->id) }}">Mulai</a>
        </div>
      </div>
    </section>
    <!-- End Quis Section -->

@endsection