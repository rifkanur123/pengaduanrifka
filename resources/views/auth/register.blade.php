<!DOCTYPE html>
<html>
<head>
    <title>Register Siswa</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #ffd6e8, #ffe9f3);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-box {
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            width: 350px;
            box-shadow: 0 10px 25px rgba(255, 105, 180, 0.2);
            text-align: center;
        }

        .register-box h2 {
            margin-bottom: 20px;
            color: #e754a3;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 10px;
            border: 1px solid #f8bbd0;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            border-color: #ec407a;
            box-shadow: 0 0 5px #f48fb1;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #ec407a;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #d81b60;
        }

        .login-link {
            margin-top: 15px;
            display: block;
            color: #e754a3;
            text-decoration: none;
            font-size: 14px;
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-box">
    <h2>💖 Register Siswa</h2>

    <form method="POST" action="/register">
        @csrf
        <input type="text" name="name" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>

    <a href="/login" class="login-link">Sudah punya akun? Login</a>
</div>

</body>
</html>