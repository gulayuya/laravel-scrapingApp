<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @for ($i = 0; $i < count($texts); $i++)
        <img src="{{ $images[$i] }}" alt=""><br>
        <p>{{ $texts[$i] }}</p>
    @endfor
</body>
</html>