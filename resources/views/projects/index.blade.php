<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projects</title>
</head>
<body>
    <h1>Bird Board</h1>
    @foreach($projects as $project)
        <span>{{ $project->title ?? ''  }}</span>
    @endforeach
</body>
</html>
