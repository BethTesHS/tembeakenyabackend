<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>
</head>

<body>
    <p>Your email has been successfully verified.</p>
    <button onclick="redirectToApp()">Open App</button>

    <script>
        function redirectToApp() {
            window.location.href = 'https://tembeakenyabackend.fly.dev/verify-email-success';
        }
    </script>
</body>

</html>
