<!DOCTYPE html>
<html>
<head>
    <title>{{$data['subject']}}</title>
</head>
<body>
    <p>Dear, {{$customer->first_name}}. </p>
    <p>{{ $data['body']}}</p>
    <p>Thank you for attention {{$customer->first_name}} {{$customer->last_name}}. Good luck!</p>
</body>
</html>
