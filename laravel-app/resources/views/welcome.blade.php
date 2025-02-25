<!DOCTYPE html>
<html>
<head>
    <title>Chat Application</title>
</head>
<body>
    <h1>Welcome to the Chat!</h1>

    <form action="/join" method="post">
        <!-- he @csrf directive adds a CSRF token for security. -->
        @csrf
        <label for="nickname">Enter your nickname:</label>
        <input type="text" id="nickname" name="nickname">
        <button type="submit">Join Chat</button>
    </form>
</body>
</html>