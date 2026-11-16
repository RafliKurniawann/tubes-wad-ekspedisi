<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container kecil">
    <div class="header">
        <div>
            <h1>Login</h1>
            <p>Masuk untuk mengelola direktori ekspedisi.</p>
        </div>
    </div>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <label>Email</label>
            <input type="email" name="email" placeholder="admin@example.com" value="{{ old('email') }}" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Masuk</button>
        </form>
    </div>
</div>

</body>
</html>