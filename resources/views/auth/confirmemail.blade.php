<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>You receive a verification code </h2>
    <p>Enter verification code</p>
    <form method="post" action="{{route('store.user')}}">
        @csrf
        <input type="text" name="code" placeholder="Enter verify code">
        <input type="submit" value="verify email" name="verify_email">
        <input type="submit" value="get code" name="get_code">
    </form>
</body>
</html>