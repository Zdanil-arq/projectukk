<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"> --}}
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-...hash..." crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.0-web/css/all.min.css') }}">
</head>

<body>

    <div class="judul">
        <h1 class="text-center">LOGIN</h1>
    </div>

    <div class="content mt-3">
        <div class="kiri">
            <img src="{{ asset('storage/img/loginlogo.png') }}" alt="logo" class="logo">
            <h2>LOGIN</h2>
        </div>
        <div class="kanan">
            <div class="form">
                <h3>Login</h3>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <div class="input-group">
                        <span><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="username" id="username" placeholder="Kode Guru">
                    </div>
                    <div class="input-group">
                        <span><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="password" id="password" placeholder="Password">
                    </div>
                    {{-- <div class="d-flex justify-content-end">
                        <a href="dashboard.html" class="forgot">Forgot password</a>
                    </div> --}}
                    <button type="submit">Log In</button>
                    {{-- <p class="register">Don't have an account? <a href="#">REGISTER HERE</a></p> --}}
                </form>
            </div>
        </div>
    </div>


    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script> --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
