<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Previseguros</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('fontawesome/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  
  {{-- reCAPTCHA CDN --}}
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body class="bg-gradient-primary">

  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">
        @if($errors->any())
          <div class="alert alert-danger m-auto text-center" role="alert" id="errorMessage">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" style="font-size:20px">×</span>
              </button>
              {{-- @foreach ($errors->all() as $error)
                  {{ $error }}
              @endforeach --}}
              {{$errors->first()}}
          </div>
        @endif 

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('admin.login.submit') }}" autocomplete="off">
                    @csrf

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user w-75 m-auto" id="username" name="name" value="{{ old('name') }}" aria-describedby="emailHelp" placeholder="Nombre de Usuario" autocomplete="off" autofocus>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user w-75 m-auto" id="password" name="password" placeholder="Contraseña">
                    </div>

                    <div class="form-group d-flex justify-content-center">
                      <div class="col-md-6 offset-1">
                        <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                        @if($errors->has('g-recaptcha-response'))
                          <span class="invalid-feedback" style="display: block;">
                            <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                          </span>
                        @endif
                      </div>
                    </div>

                    <button type="submit" class="d-block btn btn-primary btn-user w-25 m-auto">
                      Iniciar Sesión
                    </button>
                    <hr>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('js/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('js/jquery/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
  <script>
    let message = document.getElementById('errorMessage')
    let username = document.getElementById('username');
    let password = document.getElementById('password');
    
    if (message) {
      $(document).ready(() => {
        if (username.value.length < 1) {
          username.classList.add('is-invalid')
        }

        username.addEventListener('keyup', () => {
          if(username.value.length < 1){
            username.classList.add('is-invalid');
          } else {
            username.classList.remove('is-invalid');
            username.classList.add('is-valid');
          }
        });

        if (password.value.length < 1) {
          password.classList.add('is-invalid')
        }

        password.addEventListener('keyup', () => {
          if (password.value.length < 8) {
            password.classList.add('is-invalid');
          } else {
            password.classList.remove('is-invalid');
            password.classList.add('is-valid');
          }
        });

      });

      if(message.innerText.indexOf('Usuario') != -1){
        password.classList.add('is-invalid')
        username.classList.add('is-invalid')
      }
    }
  </script>
</body>

</html>
