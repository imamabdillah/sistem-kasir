<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Kenanagan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{!! asset('assets/img/fckenanganlogo.png') !!}" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/login-style.css') }}" rel="stylesheet">

    <!-- Button Search -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="wrapper">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h2 class="text-primary">Login</h2>
            <div class="form">
                <input type="email" name="email" class="login mt-3" placeholder="Email" required
                    value="{{ old('email') }}">
                <input type="password" name="password" class="login mt-3" placeholder="Password" required>
                <div class="forget">
                    <label for="remember">
                        <input type="checkbox" id="remember" name="remember">
                        <a href="#">Remember me</a>
                    </label>
                    <a href="#">Forgot password?</a>
                </div>
            </div>
            <button type="submit" class="button-login">Login</button> <br>

            <div class="register">
                <p class="text-dark">Don't have an account? <a href="{{ route('register.form') }}"
                        class="fw-bold">Register now</a></p>
            </div>
        </form>
    </div>
</body>


</html>
