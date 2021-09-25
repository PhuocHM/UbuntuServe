<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Spark CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div id="back">
        <div class="backRight"></div>
        <div class="backLeft" style="background-image:url({{ asset('images/background.jpg') }})"></div>
    </div>

    <div id="slideBox">
        <div class="topLayer">
            <div class="right">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="content">
                        <h2>Đăng nhập</h2>
                        @if ($errors->any())
                            <span style="color:red">{{ $errors->first() }}</span>
                        @endif
                        <div class="form-group">
                            <label for="email" class="form-label">Tài khoản</label>
                            <input type="text" id="email" name="email" />
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" id="password" name="password" />
                        </div>
                        <button id="login" type="submit">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Inspiration from: http://ertekinn.com/loginsignup/-->
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script>

    </script>
</body>

</html>
