<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>
</head>
<body>
    <h1>Forget Password</h1>

    @if($errors->any())
        @foreach ( $errors->all() as $error )
            <li style="color: red">{{ $error }}</li>
        @endforeach
    @endif

    @if(Session::has('error'))
        <li style="color: red">{{ Session::get('error') }}</li>
    @endif

    @if (Session::has('success'))
        <li style="color: green">{{ Session::get('success') }}</li>
    @endif

    <form action="{{ route('admin.forgetPassword_submit') }}" method="POST">
        @csrf
        <input type="email" name="email" id="" placeholder="Enter email">
        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('admin.login') }}">Back to login page</a>
</body>
</html>