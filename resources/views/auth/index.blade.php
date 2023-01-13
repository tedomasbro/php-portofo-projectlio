<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login With Your Google</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body class="bg-light">
  <main class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="col-6 mx-auto text-center px-5 py-5 border rounded bg-white">
      @if (Session::has('ERROR'))
          <div class="alert alert-danger">
            {{ Session::get('ERROR') }}
          </div>
      @endif
        <h1>Login</h1>
        <p>Login You Google Account</p>
        <a href='{{ url('auth/redirect') }}' class="btn border border-primary"><img width="20px"
                style="margin-bottom:3px; margin-right:5px" alt="Google sign-in"
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
            Login dengan Google</a>
    </div>
</main>
</body>
</html>