<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body class="blue darken-4 white-text" style="display:flex;justify-content:center;align-items:center;height:100vh;">

    <div class="card" style="padding: 30px; width: 400px;">
        <h5 class="center-align">Login Admin</h5>

        @if(session('error'))
            <p class="red-text center">{{ session('error') }}</p>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="input-field">
                <input type="text" name="username" required>
                <label for="username">Username</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required>
                <label for="password">Password</label>
            </div>
            <button type="submit" class="btn blue darken-2 full-width" style="width: 100%">Login</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
