<!DOCTYPE html>
<html>
<head>
    <title>Chat Room</title>
</head>
<body>
<!-- {{ Session::get('nickname') }}: This will display the nickname that you stored in the session -->
    <h1>Welcome to the Chat, {{ Session::get('nickname') }}!</h1>
    <div id="root"></div>
</body>
</html>
