<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('auth/style.css') }}">
    <title>Authentication</title>
</head>

<body>
    <div class="form-container">
        <div class="form-box login">
            <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h1>Sign in</h1>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    <i class='bx  bx-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="password" required>
                    <i class='bx  bx-car-key'></i>
                </div>
                <div class="forget-link">
                    {{--  <a href="#">Forget password</a>  --}}
                </div>
                <button type="submit" class="btn">Login</button>
                @if (session('auth_form') == 'login')
                    @if ($errors->any())
                        <ul class="px-4 py-2">
                            @foreach ($errors->all() as $error)
                                <li class="my-2 text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                @endif
            </form>
        </div>
        <!-- Register Form -->
        <div class="form-box register">
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h1>Sign up</h1>
                <div class="input-box">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="username" required>
                    <i class='bx  bx-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                    <i class='bx  bx-envelope-alt'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="password" required>
                    <i class='bx  bx-car-key'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="password_confirmation" placeholder="Confirm password" required>
                    <i class='bx  bx-check-square'></i>
                </div>
                <button type="submit" class="btn">Sign up</button>
                @if (session('auth_form') == 'register')
                    @if ($errors->any())
                        <ul class="px-4 py-2 ">
                            @foreach ($errors->all() as $error)
                                <li class="my-2 text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                @endif
            </form>
        </div>
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <iframe src="https://lottie.host/embed/cb209e08-09b0-4594-be10-b3346dcc270c/Fi4gNsEKfP.lottie"></iframe>
                <p>Don not have Account</p>
                <button class="btn btn-register">Sign up</button>
            </div>
            <div class="toggle-panel toggle-right">
                <iframe src="https://lottie.host/embed/16663f66-ca5a-4f38-bcf8-a0fd496d5147/sjVR3iwjYd.lottie"></iframe>
                <p>Already Have A Account</p>
                <button class="btn btn-login">Sign in</button>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
</script>
<script>
    const activeForm = "{{ session('auth_form', 'login') }}";
</script>
<script src="{{ asset('auth/login.js') }}"></script>

</html>
