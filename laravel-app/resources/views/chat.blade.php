<!DOCTYPE html>
<html>
<head>
    <title>Chat Room</title>
    <link rel="stylesheet" href="{{ asset('static/css/main.f855e6bc.css') }}">
</head>
<body>
    <h1>Welcome to the Chat, {{ $nickname }}!</h1>
    <input type="hidden" id="nickname" value="{{ $nickname }}">
    <div id="root"></div>
    <script src="{{ asset('static/js/main.c49feeb3.js') }}"></script>
</body>
</html>