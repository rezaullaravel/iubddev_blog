<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<p>Dear {{ $name }} . Click the below link to verify your account.</p>
<p>
    <a href="{{ route('verify.account',$code) }}">{{ route('verify.account',$code) }}</a>
</p>

<p>Best Regards and Thanks</p>
<h4>Iu bd Blog Team</h4>
</body>
</html>
