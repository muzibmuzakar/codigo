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
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                    <img class="img-profile rounded-circle"
                        src="{{ asset('img/undraw_profile.svg')}}">
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
            <h1 class="h3 mb-0 text-gray-800">Tambah Materi</h1>
            <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
        </div>

        <!-- Content Row -->
        <form class="user" action="{{ route('materi.store') }}" enctype="multipart/form-data" method="POST">
                                
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
            <div class="form-group">
                <label for="name" class="form-label">Pelajaran :</label>
                <select name="id_pelajaran" class="form-select form-control" aria-label="Default select example">
                    @foreach ($pelajaran as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                </select>
                {{-- <input type="text" id="name" class="form-control" name="name" placeholder="{{ $pelajaran->name }}" value="{{ $pelajaran->id }}" disabled> --}}
                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
            </div>
            <div class="form-group">
                <label for="judul" class="form-label">Judul :</label>
                <input type="text" id="judul" class="form-control" name="judul" placeholder="Judul Materi" value="{{ old('judul') }}">
                <span class="text-danger">@error('judil'){{ $message }}@enderror</span>
            </div>
            <div class="form-group">
                <label for="detail" class="form-label">Detail :</label>
                <textarea type="text" id="detail" class="form-control" name="detail" placeholder="Detail" value="{{ old('detail') }}"></textarea>
                <span class="text-danger">@error('detail'){{ $message }}@enderror</span>
            </div>
            <div class="form-group">
                <label for="video" class="form-label">Link Video :</label>
                <input type="text" id="video" class="form-control" name="video" placeholder="video Materi" value="{{ old('video') }}">
                <span class="text-danger">@error('judil'){{ $message }}@enderror</span>
            </div>
            <div class="form-group">
                <label for="game" class="form-label">Link Game :</label>
                <input type="text" id="video" class="form-control" name="game" placeholder="game Materi" value="{{ old('game') }}">
                <span class="text-danger">@error('judil'){{ $message }}@enderror</span>
            </div>
            <div class="form-group">
                <label for="slide" class="form-label">Slide Materi :</label>
                <div class="card shadow-sm w-100">
                    <div class="card-header d-flex justify-content-end">
                        <input type="file" name="images[]" id="image" multiple="" class="d-none" onchange="image_select()">
                        <button class="btn btn-sm btn-success" type="button" onclick="document.getElementById('image').click()"><i class="fas fa-file-upload fa-sm text-white-50"></i> Upload Slide</button>
                    </div>
                    <div class="card-body d-flex flex-wrap justify-content-center" id="container">
                          <!-- image preview -->
                    </div>
                </div>
                <span class="text-danger">@error('image'){{ $message }}@enderror</span>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Simpan Materi
            </button>
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

    <style>
        .image_container {
            height: 120px;
            width: 200px;
            border-radius: 6px;
            overflow: hidden;
            margin: 10px;
        }
        .image_container img {
            height: auto;
            width: auto;
            object-fit: cover;
        }
        .image_container span {
            top: -6px;
            right: 8px;
            color: red;
            font-size: 28px;
            font-weight: normal;
            cursor: pointer;
        }
    </style>

    <script>
        var images = [];
   	  function image_select() {
   	  	  var image = document.getElementById('image').files;
   	  	  for (i = 0; i < image.length; i++) {
   	  	  	  if (check_duplicate(image[i].name)) {
                images.push({
   	  	  	  	    "name" : image[i].name,
   	  	  	  	    "url" : URL.createObjectURL(image[i]),
   	  	  	  	    "file" : image[i],
   	  	  	    })
   	  	  	  } else 
   	  	  	  {
   	  	  	  	 alert(image[i].name + " is already added to the list");
   	  	  	  }
   	  	  }
   	  	  document.getElementById('container').innerHTML = image_show();
   	  }

   	  function image_show() {
   	  	  var image = "";
   	  	  images.forEach((i) => {
   	  	  	 image += `<div class="image_container d-flex justify-content-center position-relative">
   	  	  	  	  <img src="`+ i.url +`" alt="Image">
   	  	  	  	  <span class="position-absolute" onclick="delete_image(`+ images.indexOf(i) +`)">&times;</span>
   	  	  	  </div>`;
   	  	  })
   	  	  return image;
   	  }
   	  function delete_image(e) {
   	  	  images.splice(e, 1);
   	  	  document.getElementById('container').innerHTML = image_show();
   	  }

   	  function check_duplicate(name) {
   	  	var image = true;
   	  	if (images.length > 0) {
   	  		for (e = 0; e < images.length; e++) {
   	  			if (images[e].name == name) {
   	  				image = false;
   	  				break;
   	  			}
   	  		}
   	  	}
   	  	return image;
   	  }

    </script>

@endsection