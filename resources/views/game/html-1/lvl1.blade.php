@extends('layouts.main')

@section('main')
<!-- UIkit CSS -->
<link rel="stylesheet" href="{{ asset('assets-frontend/css/quiz.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/css/uikit.min.css" />

    <!-- ======= Quis Section ======= -->
    <section id="game">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('img/char.png') }}" class="uk-position-small uk-position-bottom-left uk-overlay uk-overlay-default" alt="">
                <h4 class="text-center" style="top:0;">Susun Tag HTML dibawah ini agar menjadi struktur HTML yang benar .</h4>
                <div class="uk-flex uk-flex-center">
                    <div class="dragAndDrop" ondrop="drop001(event)">
                        <div ondragstart="dragStart001(event)" draggable="true" id="target001"><p class="choice">&lt;html&gt;</p></div>
                    </div>
                    <div class="dragAndDrop" ondrop="drop002(event)">
                        <div ondragstart="dragStart002(event)" draggable="true" id="target002"><p class="choice">&lt;head&gt;</p></div>
                    </div>
                    <div class="dragAndDrop" ondrop="drop003(event)">
                        <div ondragstart="dragStart003(event)" draggable="true" id="target003"><p class="choice">&lt;/head&gt;</p></div>
                    </div>
                    <div class="dragAndDrop" ondrop="drop004(event)">
                        <div ondragstart="dragStart004(event)" draggable="true" id="target004"><p class="choice">&lt;body&gt;</p></div>
                    </div>
                    <div class="dragAndDrop" ondrop="drop005(event)">
                        <div ondragstart="dragStart005(event)" draggable="true" id="target005"><p class="choice">&lt;/body&gt;</p></div>
                    </div>
                    <div class="dragAndDrop" ondrop="drop006(event)">
                        <div ondragstart="dragStart006(event)" draggable="true" id="target006"><p class="choice">&lt;/html&gt;</p></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="editor" style="height:500px;background-image: url({{ asset('img/code-editor-11.svg') }});background-repeat: no-repeat;
                background-size: 100%;">
                    <input class="box001" ondrop="put001(event)" ondragover="allowDrop001(event)" id="place001" readonly><br>
                    <input class="box002" ondrop="put002(event)" ondragover="allowDrop002(event)" id="place002" readonly><br>
                    <input class="box003" ondrop="put003(event)" ondragover="allowDrop003(event)" id="place003" readonly><br>
                    <input class="box004" ondrop="put004(event)" ondragover="allowDrop004(event)" id="place004" readonly><br>
                    <input class="box005" ondrop="put005(event)" ondragover="allowDrop005(event)" id="place005" readonly><br>
                    <input class="box006" ondrop="put006(event)" ondragover="allowDrop006(event)" id="place006" readonly><br>
                </div>
                {{-- <img src="{{ asset('img/code-editor-11.svg') }}" alt=""> --}}
            </div>
            <div id="message001" class="message001 uk-position-bottom-center">
                <!-- message -->
            </div>
            <div class="uk-position-small uk-position-bottom-right">
                <div class="uk-flex uk-flex-right">
                    <p class="score" style="color: #fafafa;">Score: <text id="score001">0</text></p>
                    <button class="uk-button uk-button-primary btn-next" onclick="submit001()">Cek</button>
                    <div id="nxt">
                        <!-- <button class="uk-button uk-button-primary btn-next" onclick="submit001()">Next</button> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Quis Section -->
    <style>
        .score, .btn-next{
            margin-bottom: 0px;
            margin-right: -5px;
        }
        .score{
            margin-right: 20px;
            display: none;
        }
        .message001{
            width: 500px;
            margin-top: -200px;
        }
        #game{
            margin-top: 50px;
        }
        .box001{
            margin: 60px 0 0 30px;
            background: transparent;
            font-family: 'JetBrains Mono', monospace;
            font-size: 20px;
            color: #e06c75;
            border: dashed slategrey 1px;
        }
        .box002{
            margin: 10px 0 0 30px;
            background: transparent;
            font-family: 'JetBrains Mono', monospace;
            font-size: 20px;
            color: #e06c75;
            border: dashed slategrey 1px;
        }
        .box003{
            margin: 10px 0 0 30px;
            background: transparent;
            font-family: 'JetBrains Mono', monospace;
            font-size: 20px;
            color: #e06c75;
            border: dashed 1px slategrey;
        }
        .box004{
            margin: 10px 0 0 30px;
            background: transparent;
            font-family: 'JetBrains Mono', monospace;
            font-size: 20px;
            color: #e06c75;
            border: dashed 1px slategrey;
        }
        .box005{
            margin: 10px 0 0 30px;
            background: transparent;
            font-family: 'JetBrains Mono', monospace;
            font-size: 20px;
            color: #e06c75;
            border: dashed slategrey 1px;
        }
        .box006{
            margin: 10px 0 0 30px;
            background: transparent;
            font-family: 'JetBrains Mono', monospace;
            font-size: 20px;
            color: #e06c75;
            border: dashed slategrey 1px;
        }
        #pertanyaan{
            margin-top: 50px;
        }
        .choice{
            margin-right: 10px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 20px;
            color: #e06c75;
        }
    </style>

    <script>
        var b = 0;
        b++;

            function dragStart001(event) {
                event.dataTransfer.setData("choice001", event.target.id);
            }
            
            function dragStart002(event) {
                event.dataTransfer.setData("choice002", event.target.id);
            }
            
            function dragStart003(event) {
                event.dataTransfer.setData("choice003", event.target.id);
            }
            
            function dragStart004(event) {
                event.dataTransfer.setData("choice004", event.target.id);
            }
            
            function dragStart005(event) {
                event.dataTransfer.setData("choice005", event.target.id);
            }
            
            function dragStart006(event) {
                event.dataTransfer.setData("choice006", event.target.id);
            }
            
            function allowDrop001(event) {
                event.preventDefault();
            }
            
            function allowDrop002(event) {
                event.preventDefault();
            }
            
            function allowDrop003(event) {
                event.preventDefault();
            }
            
            function allowDrop004(event) {
                event.preventDefault();
            }
            
            function allowDrop005(event) {
                event.preventDefault();
            }
            
            function allowDrop006(event) {
                event.preventDefault();
            }
            
            function put001(event) {
                var data = event.dataTransfer.getData("choice001");
                event.target.appendChild(document.getElementById(data));
            score001.innerHTML = b++;
                    place001.value = "<html>";            
            }
            
            function put002(event) {
                var data = event.dataTransfer.getData("choice002");
                event.target.appendChild(document.getElementById(data));
            score001.innerHTML = b++;
                    place002.value = "<head>";
            }
            
            function put003(event) {
                var data = event.dataTransfer.getData("choice003");
                event.target.appendChild(document.getElementById(data));
            score001.innerHTML = b++;
                    place003.value = "</head>";
            }
            
            function put004(event) {
                var data = event.dataTransfer.getData("choice004");
                event.target.appendChild(document.getElementById(data));
            score001.innerHTML = b++;
                    place004.value = "<body>";
            }
            
            function put005(event) {
                var data = event.dataTransfer.getData("choice005");
                event.target.appendChild(document.getElementById(data));
            score001.innerHTML = b++;
                    place005.value = "</body>";
            }
            
            function put006(event) {
                var data = event.dataTransfer.getData("choice006");
                event.target.appendChild(document.getElementById(data));
            score001.innerHTML = b++;
                    place006.value = "</html>";
            }
            
            function drop001(event) {
                event.preventDefault();
            }
            
            function drop002(event) {
                event.preventDefault();
            }
            
            function drop003(event) {
                event.preventDefault();
            
            }
            
            function drop004(event) {
                event.preventDefault();
            }
            
            function drop005(event) {
                event.preventDefault();
            }
            
            function drop006(event) {
                event.preventDefault();
            }
            
            
            function submit001() {
                if (b > 6) {
                    nxt.innerHTML = "<a href='{{ route('game.html1.lvl2',$materi->id) }}' style='margin-left:20px;' class='uk-button uk-button-danger btn-next'>Next</a>";
                    alert('Jawaban Benar, Kamu Bisa lanjut ke tantangan berikutnya !');
                }
                else{
                    alert('Jawaban belum tepat');
                }
            }
    </script>
@endsection