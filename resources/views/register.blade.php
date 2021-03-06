<!DOCTYPE html>
<html xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
    <title>Register</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/all.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }
        label {
            font-weight: bold;
        }
        a {
            font-weight: bold;
        }
        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }
        .content {
            text-align: center;
            display: inline-block;
        }
        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<div class="container"><div class="jumbotron">REGISTER</div>
    <div class="content">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action={{ route('register.postRegister') }}>
            <input type="hidden" value="{{ csrf_token() }}" name="_token">

            <div class="form-group">
                <label for="name">User name</label>
                <input type="text"
                       class="form-control"
                       id="name" name="name"
                       placeholder="El teu nom aquí"
                       value="{{old("name")}}"

                       required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>

                <input
                       type="email"
                       class="form-control"
                       id="email" name="email"
                       placeholder="@{{placeholder}}"
                       value="{{old("email")}}"
                       required
                        v-on:blur="checkEmailExsists">

            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <!--input type="number" class="form-control" name="is_admin"-->

            <button id="Login" type="submit" class="btn btn-primary">Register</button>
            <button type="reset" class="btn btn-default">Reset</button>

        </form>

        <label>Already have an account?</label>
        <a id="Login" href="{{ route('auth.getLogin') }}">Login</a>

    </div>
</div>

<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>