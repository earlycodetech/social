<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <div style="background-color: #000000; color: #FFFFFF; padding: 20px;">
        <h3>Name:  {{ $data['name'] }}</h3>
        <h3>Email:  {{ $data['email'] }}</h3>

        <h6>Message: </h6>

        <p>
            {{ $data['message'] }}
        </p>
    </div>
</body>
</html>