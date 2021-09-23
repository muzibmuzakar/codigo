@extends('admin.layouts.main')
@section('content')

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
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
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
            <h1 class="h3 mb-0 text-gray-800">Detail Pelajaran</h1>
            <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
        </div>

        <div class="container-fluid">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center">
                        <div class="card" style="width:200px">
                            <img class="card-img" src="{{ url('/image/'.$pelajaran->image) }}" alt="Card image" style="width:100%">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h2 class="name-pelajaran">{{ $pelajaran->name }}</h2>
                        <hr class="my-2">
                        <p>{{ $pelajaran->detail }}</p>
                        <div class="btn-options d-flex justify-content-end mt-4">
                            <button class="materi-save btn-sm" type="button" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog fa-sm mr-2"></i> Options
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('pelajaran.edit',$pelajaran->id) }}"><i class="far fa-edit"></i> Ubah</a></li>
                                <li>
                                    <form action="{{ route('pelajaran.destroy',$pelajaran->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" }}"><i class="far fa-trash-alt"></i> Hapus</button>
                                    </form>
                                    
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-add-materi d-flex justify-content-between">
                <h2 class="h4 mb-0 text-gray-800">Daftar Materi <span>:</span></h2>
                <a href="{{ route('materi.addMateri',$pelajaran->id) }}" class="btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm"></i> Add Materi</a>
            </div>

            @if ($materi->isEmpty())
                <div class="text-center mt-5">
                    <p class="text-gray-500 mb-0">Belum ada materi yang tersedia pada pelajaran {{ $pelajaran->name }}</p>
                    <a href="{{ route('materi.addMateri',$pelajaran->id) }}"><i class="fas fa-plus fa-sm"></i>  Tambah Materi</a>
                </div>
            @else
            @foreach ($materi as $m) 
            <div class="card-materi">
                <article class="materi">
                    <div class="materi-box">
                        <img src="{{ url('/image/'.$pelajaran->image) }}" width="1500" height="1368" alt="">
                    </div>
                    <div class="materi-content">
                        <h1 class="materi-title"><a href="#">{{ $m->judul }}</a></h1>
            
                        {{-- <p class="materi-metadata">
                            <span class="materi-votes">(12 votes)</span>
                        </p> --}}
            
                        <p class="materi-desc">{{ $m->detail }}</p>
                        <div class="btn-options d-flex justify-content-end mt-4">
                            <button class="materi-save btn-sm" type="button" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog fa-sm mr-2"></i> Options
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                {{-- <li><a class="dropdown-item" href="{{ route('materi.show',$m->id) }}"><i class="far fa-eye"></i> Lihat Materi</a></li> --}}
                                <li><a class="dropdown-item" href="{{ route('materi.edit',$m->id) }}"><i class="far fa-edit"></i> Ubah</a></li>
                                <li>
                                    <form action="{{ route('materi.destroy',$m->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" }}"><i class="far fa-trash-alt"></i> Hapus</button>
                                    </form>
                                    
                                </li>
                            </ul>
                        </div>
            
                    </div>
                </article>
            </div>
            
            @endforeach
                
            @endif
        </div>
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

    <style>
        .jumbotron{
            margin-left: -20px;
            margin-right: -20px;
            background-color: #fff;
            box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15);
            border-radius: 15px;
        }

        .card-materi{
            margin-top: 20px;
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
        margin-top : -40px;
        width: auto;
        height: auto;
        -o-object-fit: cover;
            object-fit: cover;
        -o-object-position: 50% 50%;
            object-position: 50% 50%;
        }
        @media (min-width:782px){
            .materi-box img {
                margin-top : -80px;
            }
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
        .materi-title {
        margin: 0;
        font-size: clamp(1.4em, 2.1vw, 2.1em);
        font-family: "Roboto Slab", Helvetica, Arial, sans-serif;
        }
        .materi-title a {
        text-decoration: none;
        color: inherit;
        }
        .materi-metadata {
        margin: 0;
        }
        .materi-votes {
        font-size: 0.825em;
        font-style: italic;
        color: var(--lightgrey);
        }
        .materi-save {
        display: flex;
        align-items: center;
        padding: 6px 14px 6px 12px;
        border-radius: 4px;
        border: 2px solid currentColor;
        color: var(--primary);
        background: none;
        cursor: pointer;
        font-weight: bold;
        }
        /* css dropdown */
        .dropdown-menu{
            border-radius: 15px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
        }

        .btn-dropdown{
            top: -100px;
            margin-left: 180px;
            font-size: 20px;
            text-decoration: none;
            color: black;
        }
        @media(max-width:782px){
            .name-pelajaran{
                padding-top: 20px;
            }
        }
        @media(min-width:782px){
            .name-pelajaran{
                padding-top: 20px;
            }
        }
    </style>

@endsection