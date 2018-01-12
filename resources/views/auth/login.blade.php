<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="FHQ - Forum Halaqoh Qur'an">
  <meta name="author" content="Hamba Allah">
  <meta name="keyword" content="FHQ, Forum Halaqoh Qur'an, Islam, Al-Qur'an, Tahsin, Takhosus, Tahfidz">
  <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
  <link rel="shortcut icon" href="{{ url('/') }}/dist/img/favicon.png">

  <title>FHQ - Login</title>

  <!-- Icons -->
  <link href="dist/vendors/css/font-awesome.min.css" rel="stylesheet">
  <link href="dist/vendors/css/simple-line-icons.min.css" rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="dist/css/style.css" rel="stylesheet">

  <style type="text/css">
    .invalid-feedback {
      color: red;
      display: block;
      float: right;
    }
  </style>

  <!-- Styles required by this views -->

</head>

<body class="app flex-row align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card-group">
          <div class="card p-4">
            <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              <h1>Login</h1>
              <p class="text-muted">Sign In to your account</p>
              
              <div class="input-group mb-3">
                <span class="input-group-addon"><i class="icon-envelope"></i></span>
                <input id="email" type="email" class="form-control" name="email" value="alimm.abdullah@gmail.com" required autofocus placeholder="Email">
              </div>
              @if ($errors->has('email'))
              <p class="invalid-feedback">
                {{ $errors->first('email') }}
              </p>
              @endif

              <div class="input-group mb-4">
                <span class="input-group-addon"><i class="icon-lock"></i></span>
                <input id="password" type="password" class="form-control" name="password" required placeholder="Password" value="123456">
              </div>
              @if ($errors->has('password'))
              <p class="invalid-feedback">
                {{ $errors->first('password') }}
              </p>
              @endif


              <div class="row">
                <div class="col-6">
                  <button type="submit" class="btn btn-primary px-4">Login</button>
                </div>
                <div class="col-6 text-right">
                  <a href="{{ route('password.request') }}" class="btn btn-link px-0">Forgot password?</a>
                </div>
              </div>
              </form>
            </div>
          </div>
          <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
            <div class="card-body text-center">
              <div>
                <!-- <h2>Sign up</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <button type="button" class="btn btn-primary active mt-3">Register Now!</button> -->

                <h2>FHQ</h2>
                <p style="margin-top: 15px">Rasullullah shallallahu 'alaihi wa sallam bersabda, <strong><em>"Sebaik-baik kalian adalah yang belajar Al-Qur'an dan mengajarkannya"</em></strong> (HR. Bukhari)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap and necessary plugins -->
  <script src="dist/vendors/js/jquery.min.js"></script>
  <script src="dist/vendors/js/popper.min.js"></script>
  <script src="dist/vendors/js/bootstrap.min.js"></script>

</body>
</html>