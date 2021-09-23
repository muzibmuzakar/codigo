@extends('layouts.main')

@section('main')
<!-- UIkit CSS -->
<link rel="stylesheet" href="{{ asset('assets-frontend/css/quiz.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/css/uikit.min.css" />

    <!-- ======= Quis Section ======= -->
    <section id="quiz">
        <div class="container container-quiz">
            <div id="game" class="text-center">
                <div id="hud">
                  <div id="hud-item">
                    <p id="progressText" class="hud-prefix">
                      Question
                    </p>
                    <div id="progressBar">
                      <div id="progressBarFull"></div>
                    </div>
                  </div>
                  <div id="hud-item">
                    <p class="hud-prefix">
                      Score
                    </p>
                    <h1 class="hud-main-text" id="score">
                      0
                    </h1>
                  </div>
                </div>
                <h2 id="question">What is the answer to this questions?</h2>
                <div class="choice-container">
                  <div class="choice-prefix"><p>A</p></div>
                  <p class="choice-text" data-number="1">Choice 1</p>
                </div>
                <div class="choice-container">
                  <div class="choice-prefix"><p>B</p></div>
                  <p class="choice-text" data-number="2">Choice 2</p>
                </div>
                <div class="choice-container">
                  <div class="choice-prefix"><p>C</p></div>
                  <p class="choice-text" data-number="3">Choice 3</p>
                </div>
                <div class="choice-container">
                  <div class="choice-prefix"><p>D</p></div>
                  <p class="choice-text" data-number="4">Choice 4</p>
                </div>
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
        .choice-container {
            display: flex;
            margin-bottom: 0.5rem;
            width: 100%;
            height: 50px;
            font-size: 1.8rem;
            border: 0.1rem solid rgb(86, 165, 235, 0.25);
            background-color: white;
        }

        .choice-container:hover {
            cursor: pointer;
            box-shadow: 0 0.4rem 1.4rem 0 rgba(86, 185, 235, 0.5);
            transform: translateY(-0.1rem);
            transition: transform 150ms;
        }

        .choice-prefix {
            padding-top: 24px;
            padding-bottom: 24px;
            padding-left: 20px;
            padding-right: 20px;
            /* padding: 24px 20px; */
            background-color: #56a5eb;
            color: white;
        }
        .choice-prefix p{
            margin-top: -20px;
        }

        .choice-text {
            /* padding: 1.5rem; */
            margin-top: 0px;
            width: 100%;
        }

        .correct {
            background-color: #CAF7E3;
        }

        .incorrect {
            background-color: #FFAAA7;
        }

        /* HUD */

        #hud {
            display: flex;
            justify-content: space-between;
        }

        #hud-item p{
            font-size: 25px;
        }

        .hud-prefix {
            text-align: left;
            font-size: 2rem;
        }

        .hud-main-text {
            text-align: center;
        }

        #progressBar {
            width: 20rem;
            height: 2rem;
            border: 0.3rem solid #56a5eb;
            margin-top: 1.5rem;
        }

        #progressBarFull {
            height: 1.5rem;
            background-color: #56a5eb;
            width: 0%;
        }

        #score{
            font-size: 30px;
            margin-top: 0px;
        }

        #question{
            font-size: 30px;
            width: 600px;
        }

    </style>

    <script>
      const question = document.getElementById("question");
      const choices = Array.from(document.getElementsByClassName("choice-text"));
      const progressText = document.getElementById("progressText");
      const scoreText = document.getElementById("score");
      const progressBarFull = document.getElementById("progressBarFull");
      let currentQuestion = {};
      let acceptingAnswers = false;
      let score = 0;
      let questionCounter = 0;
      let availableQuesions = [];

      let questions = [];
      fetch("{{ asset('storage/'.$materi->id.'.json') }}")
        .then((res) => {
            return res.json();
        })
        .then((loadedQuestions) => {
            console.log(loadedQuestions);
            questions = loadedQuestions;
            startGame();
        })
        .catch((err) => {
            console.error(err);
        });

      //CONSTANTS
      const CORRECT_BONUS = 10;
      const MAX_QUESTIONS = 5;

      startGame = () => {
        questionCounter = 0;
        score = 0;
        availableQuesions = [...questions];
        getNewQuestion();
      };

      getNewQuestion = () => {
        if (availableQuesions.length === 0 || questionCounter >= MAX_QUESTIONS) {
          localStorage.setItem("mostRecentScore", score);
          //go to the end page
          return window.location.assign("{{ route('quiz.endQuiz',$materi->id) }}");
        }
        questionCounter++;
        progressText.innerText = `Question ${questionCounter}/${MAX_QUESTIONS}`;
        //Update the progress bar
        progressBarFull.style.width = `${(questionCounter / MAX_QUESTIONS) * 100}%`;

        const questionIndex = Math.floor(Math.random() * availableQuesions.length);
        currentQuestion = availableQuesions[questionIndex];
        question.innerText = currentQuestion.question;

        choices.forEach(choice => {
          const number = choice.dataset["number"];
          choice.innerText = currentQuestion["choice" + number];
        });

        availableQuesions.splice(questionIndex, 1);
        acceptingAnswers = true;
      };

      choices.forEach(choice => {
        choice.addEventListener("click", e => {
          if (!acceptingAnswers) return;

          acceptingAnswers = false;
          const selectedChoice = e.target;
          const selectedAnswer = selectedChoice.dataset["number"];

          const classToApply =
            selectedAnswer == currentQuestion.answer ? "correct" : "incorrect";

          if (classToApply === "correct") {
            incrementScore(CORRECT_BONUS);
          }

          selectedChoice.parentElement.classList.add(classToApply);

          setTimeout(() => {
            selectedChoice.parentElement.classList.remove(classToApply);
            getNewQuestion();
          }, 1000);
        });
      });

      incrementScore = num => {
        score += num;
        scoreText.innerText = score;
      };

      // startGame();

    </script>

@endsection