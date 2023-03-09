<!DOCTYPE html>
<html>
<head>
 <title>Laravel 9 Send Email Example</title>
</head>
<body>
 
 <h1>Hello {{$data["name"]}}</h1>
 <p>Please click link to <a href="{{route('verify',['uuid' => $data['random']])}}">Link</p>
 
</body>
</html> 