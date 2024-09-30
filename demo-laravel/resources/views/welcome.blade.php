<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Hello Laravel</h1>

    @if ($greeting)
        <p>Has greeting</p>
    @else
	<p>No greeting</p>
    @endif
</body>
</html>