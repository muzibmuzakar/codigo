@extends('admin.layouts.main')
@section('content')
<!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/css/uikit.min.css" />

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/js/uikit-icons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                    <img class="img-profile rounded-circle"
                        src="{{ asset('img/undraw_profile.svg') }}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Quiz</h1>
            <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
        </div>

        <!-- Content Row -->
        <form action="{{ route('quiz.store') }}" enctype="multipart/form-data" method="POST">
            @if (Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif
            @csrf
            <div uk-grid class="mb-3">
                <div class="uk-width-1-2@s">
                    <label class="form-label" for="form-stacked-select">Pelajaran :</label>
                    <div class="uk-form-controls">
                        <select class="uk-select" id="pelajaran" name="pelajaran_id">
                            <option value="">-- Pilih Pelajaran --</option>
                            @foreach ($pelajaran as $p)
                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="uk-width-1-2@s">
                    <label class="form-label" for="form-stacked-select">Materi :</label>
                    <div class="uk-form-controls">
                        <select class="uk-select" id="materi" name="materi_id">
                            <option value="">-- Pilih Materi --</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="form-stacked-text">Judul :</label>
                <div class="uk-form-controls">
                    <input class="uk-input" name="judul" id="form-stacked-text" type="text">
                </div>
            </div>
            <h1 class="h4 mb-0 text-gray-800">Soal</h1>
            <div class="soal">
                <div class="uk-section uk-section-default" style="padding-top: 30px; padding-bottom: 30px; margin-top:10px; margin-bottom:20px; box-shadow: 0 0 29px 0 rgba(40, 46, 65, 0.137); border-radius:10px;">
                    <div class="uk-container">
                        <div class="form-group">
                            <label class="form-label" for="form-stacked-text">Pertanyaan :</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" name="question[0]" id="form-stacked-text" type="text" placeholder="Masukan pertanyaan...">
                            </div>
                        </div>
                        <div class="uk-grid-match uk-child-width-1-2@m" uk-grid>
                            <div class="form-grup">
                                <label class="form-label" for="form-stacked-text">Pilihan 1 :</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" name="choice1[0]" id="form-stacked-text" type="text" placeholder="Masukan pilihan 1...">
                                </div>
                            </div>
                            <div class="form-grup">
                                <label class="form-label" for="form-stacked-text">Pilihan 2 :</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" name="choice2[0]" id="form-stacked-text" type="text" placeholder="Masukan pilihan 2...">
                                </div>
                            </div>
                            <div class="form-grup" style="margin-top: 20px;">
                                <label class="form-label" for="form-stacked-text">Pilihan 3 :</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" name="choice3[0]" id="form-stacked-text" type="text" placeholder="Masukan pilihan 3...">
                                </div>
                            </div>
                            <div class="form-grup" style="margin-top: 20px;">
                                <label class="form-label" for="form-stacked-text">Pilihan 4 :</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" name="choice4[0]" id="form-stacked-text" type="text" placeholder="Masukan pilihan 4...">
                                </div>
                            </div>
                            <div class="form-grup" style="margin-top: 20px;">
                                <label class="form-label" for="form-stacked-text">Pilihan Benar :</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" name="answer[0]" id="form-stacked-text" type="text" placeholder="Masukan no pilihan yang benar...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="float-right d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" id="addSoal">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Soal</a>
            <button class="btn btn-success" type="submit">Simpan</button>
        </form>
    </div>
    <!-- /.container-fluid -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary" type="submit">Logout</button>
                    </form>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

<script>
    var i = 0;

    $('#addSoal').on('click', function () {
        addSoal();
    });

    function addSoal() {
        ++i;
        var div = '<div class="uk-section uk-section-default" style="padding-top: 30px; padding-bottom: 30px; margin-top:10px; margin-bottom:20px; box-shadow: 0 0 29px 0 rgba(40, 46, 65, 0.137);">'+
                    '<button class="float-right btn btn-sm btn-danger" id="remove" style=" margin-top:-30px;">x</button>'+
                    '<div class="uk-container">'+
                        '<div class="form-group">'+
                            '<label class="form-label" for="form-stacked-text">Pertanyaan :</label>'+
                            '<div class="uk-form-controls">'+
                                '<input class="uk-input" name="question['+i+']" id="form-stacked-text" type="text" placeholder="Masukan pertanyaan...">'+
                            '</div>'+
                        '</div>'+
                        '<div class="uk-grid-match uk-child-width-1-2@m" uk-grid>'+
                            '<div class="form-grup">'+
                                '<label class="form-label" for="form-stacked-text">Pilihan 1 :</label>'+
                                '<div class="uk-form-controls">'+
                                    '<input class="uk-input" name="choice1['+i+']" id="form-stacked-text" type="text" placeholder="Masukan pilihan 1...">'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-grup">'+
                                '<label class="form-label" for="form-stacked-text">Pilihan 2 :</label>'+
                                '<div class="uk-form-controls">'+
                                    '<input class="uk-input" name="choice2['+i+']" id="form-stacked-text" type="text" placeholder="Masukan pilihan 2...">'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-grup" style="margin-top: 20px;">'+
                                '<label class="form-label" for="form-stacked-text">Pilihan 3 :</label>'+
                                '<div class="uk-form-controls">'+
                                    '<input class="uk-input" name="choice3['+i+']" id="form-stacked-text" type="text" placeholder="Masukan pilihan 3...">'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-grup" style="margin-top: 20px;">'+
                                '<label class="form-label" for="form-stacked-text">Pilihan 4 :</label>'+
                                '<div class="uk-form-controls">'+
                                    '<input class="uk-input" name="choice4['+i+']" id="form-stacked-text" type="text" placeholder="Masukan pilihan 4...">'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-grup" style="margin-top: 20px;">'+
                                '<label class="form-label" for="form-stacked-text">Pilihan Benar :</label>'+
                                '<div class="uk-form-controls">'+
                                    '<input class="uk-input" name="answer['+i+']" id="form-stacked-text" type="text" placeholder="Masukan no pilihan yang benar...">'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
        $('.soal').append(div);
    }

    $('.soal').on('click', '#remove', function () {
            $(this).parent().remove();
        });

        $(function () {
            $('#pelajaran').on('change', function () {
                axios.post('{{ route('materiQuiz') }}', {id: $(this).val()})
                    .then(function (response) {
                        $('#materi').empty();

                        $.each(response.data, function (id, judul) {
                            $('#materi').append(new Option(judul, id))
                        })
                    });
            });
        });
</script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@endsection