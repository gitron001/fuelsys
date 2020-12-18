<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fuel System</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/5.15.1/css/all.min.css') }}">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" >
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin">
                <form action="{{ url(config('adminlte.login_url', 'login')) }}" method="post">
                    {!! csrf_field() !!}

                    <div class="logo_img">
                        <img src="{{ asset('images/petrol-pump.png')}}" class="logo-pic">
                    </div>

                    <h2 class="title">Fuel System</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="email" placeholder="{{ trans('adminlte::adminlte.email') }}" value="{{ old('email') }}" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="{{ trans('adminlte::adminlte.password') }}" required />
                    </div>
                    <div>
                        @if ($errors->any())
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color: red;">{{$error}}</li>
                            @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="message"></div>

                    <input type="submit" value="{{ trans('adminlte::adminlte.sign_in') }}" class="btn solid" />
                </form>

            </div>
        </div>
    </div>
</body>

<script>
    const password = document.querySelector('#password');
    const message = document.querySelector('.message');

    password.addEventListener('keyup', function(e) {
        if(e.getModifierState('CapsLock')) {
            message.textContent = '• Caps lock është aktiv.';
        }else {
            message.textContent = '';
        }
    })
</script>

</html>
