@extends('layouts.main')

@section('main')
<!-- UIkit CSS -->
<link rel="stylesheet" href="{{ asset('assets-frontend/css/quiz.css') }}">
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>

    <!-- ======= Quis Section ======= -->
    <section id="quiz">
        <div class="container container-quiz">
            <div id="end" class="flex-center flex-column">
                {{-- <h1 id="finalScore"></h1> --}}
                <form>

                    <section id="cards">
                        <div class="container">
                            <!-- cards -->
                            <div class="row">
                                <div class="col-lg-4 col-md-6 mb-4 pt-5">
                                    <div class="card shadow-sm border-0">
                                        <div class="card-body">
                                            <div class="user-picture">
                                                <img src="{{ asset('img/medali.png') }}" class="shadow-sm rounded-circle" height="130" width="130" />
                                            </div>
                                            <div class="user-content">
                                                <h4 class="text-capitalize user-name">{{ Auth::user()->name }}</h4>
                                                <p class="small text-muted mb-0" style="
                                                font-size: 15px;">
                                                    Selamat 
                                                    <input type="text" name="username" id="username" class="no-border" readonly value="{{ Auth::user()->name }}"/>, 
                                                    Kamu telah menyelesaikan Quiz {{ $materi->judul }} dengan score 
                                                    <input type="text" id="finalScore2" class="no-border" readonly/>
                                                </p>
                                            </div>
                                            <a href="{{ route('belajar',$materi->id) }}" class="btn btn-primary" id="saveScoreBtn">
                                                <i class="fas fa-chevron-left"></i>Kembali Ke Menu Materi
                                            </a>
                                            <a href="" class="btn btn-warning" id="saveScoreBtn">
                                                <i class="fas fa-undo"></i>Ulangi Quiz
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /cards -->
                    </section>
                </form>
            </div>
        </div>
    </section>
    <!-- End Quis Section -->

    <style>
        .container-quiz{
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 80rem;
            margin-top: -70px;
            padding: 2rem;
        }
        .no-border{
            border: none;
            width: 70px;
            text-align: center;
            font-size: 20px;
        }
        #cards .card {
            border-radius: 20px;
            height: 300px;
            min-width: 500px;
            margin-left: 100px;
        }

        #cards .heading-border {
            position: absolute;
            width: 100%;
            top: 60%;
        }

        #cards .card .user-picture img {
            position: absolute;
            top: -20%;
            right: 10%;
            background: #f8f9fa!important;
            padding: 10px;
        }

        #cards .card .user-content .user-name {
            margin-right: 150px;
        }
        .user-name{
            margin-bottom: 50px;
        }
        #saveScoreBtn{
            margin-top: 80px;
            margin-left: 20px;
            color: #f8f9fa;
        }
        #saveScoreBtn .fas{
            margin-right: 10px;
        }

    </style>

    
    <script>
        const username = document.getElementById('username');
        const saveScoreBtn = document.getElementById('saveScoreBtn');
        const finalScore = document.getElementById('finalScore');
        const mostRecentScore = localStorage.getItem('mostRecentScore');

        const highScores = JSON.parse(localStorage.getItem('highScores')) || [];

        const MAX_HIGH_SCORES = 5;

        // finalScore.innerText = mostRecentScore;
        finalScore2.setAttribute("value",mostRecentScore);

        username.addEventListener('keyup', () => {
            saveScoreBtn.disabled = !username.value;
        });

        // saveHighScore = (e) => {
        //     e.preventDefault();

        //     const score = {
        //         score: mostRecentScore,
        //         name: username.value,
        //     };
        //     highScores.push(score);
        //     highScores.sort((a, b) => b.score - a.score);
        //     highScores.splice(5);

        //     localStorage.setItem('highScores', JSON.stringify(highScores));
        //     window.location.assign('/');
        // };

    </script>

@endsection