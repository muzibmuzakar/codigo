<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up | Login Form</title>
    <!-- StyleSheet -->
    <link rel="stylesheet" href="{{ asset('assets-frontend/css/login-page.css') }}" />
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

  </head>
  <body>
    <section>
      <div class="container">
        <div class="user login">
          <div class="img-box">
            <img src="{{ asset('assets-frontend/img/bg-1.svg') }}" alt="" />
          </div>
          <div class="form-box">
            <div class="top">
              <p>
                Not a member?
                <span data-id="#ff0066">Register now</span>
              </p>
            </div>
            <form action="{{ route('user.check') }}" method="POST">
              <div class="form-control">
                <h2>Hello Again!</h2>
                <p>Welcome back you've been missed.</p>
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                @csrf
                <input type="text" placeholder="Enter Email" name="email" value="{{ old('username') }}"/>
                <span class="text-danger">@error('email'){{ $message }}@enderror</span>  
                <div>
                  <input type="password" placeholder="Password" name="password"/>
                  <div class="icon form-icon">
                    <i class="far fa-eye"></i>{{-- <img src="{{ asset('assets-frontend/img/eye.svg') }}" alt="" /> --}}
                  </div>
                </div>
                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                <input type="Submit" value="Login" />
              </div>
            </form>
          </div>
        </div>

        <!-- Register -->
        <div class="user signup">
          <div class="form-box">
            <div class="top">
              <p>
                Already a member?
                <span data-id="#1a1aff">Login now</span>
              </p>
            </div>
            <form action="{{ route('user.save') }}" method="POST" class="form">
              <div class="form-control">
                <h2>Welcome Codevo!</h2>
                <p>It's good to have you.</p>
                
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
                <div>
                  <input type="text" placeholder="Username" name="username" value="{{ old('username') }}"/>
                  <span class="text-danger">@error('username'){{ $message }}@enderror</span>
                </div>
                <div>
                  <input type="email" placeholder="Enter Email" name="email" value="{{ old('email') }}"/>
                  <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                </div>
                <div>
                  <input type="password" placeholder="Password" name="password" />
                  <div class="icon form-icon">
                    <i class="far fa-eye"></i>{{-- <img src="{{ asset('assets-frontend/img/eye.svg') }}" alt="" /> --}}
                  </div>
                </div>
                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                <input type="Submit" value="Register" />
              </div>
            </form>
          </div>
          <div class="img-box">
            <img src="{{ asset('assets-frontend/img/bg-2 (2).svg') }}" alt="" />
          </div>
        </div>
      </div>
      <a href="{{ url()->previous() }}" class="close"></a>
    </section>
    <!-- IndexJs -->
    <script src="{{ asset('assets-frontend/js/login-page.js') }}"></script>
  </body>
</html>
