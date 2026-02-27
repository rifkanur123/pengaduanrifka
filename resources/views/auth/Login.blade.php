<!DOCTYPE html>
<html>
<head>
    <title>Login Sistem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #FBC2EB, #F9A8D4);
        }

        .card {
            width: 360px;
            padding: 35px;
            border-radius: 20px;
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 15px 35px rgba(236, 72, 153, 0.3);
            color: white;
            text-align: center;
        }

        .card h2 {
            margin-bottom: 5px;
        }

        .subtitle {
            font-size: 14px;
            opacity: 0.85;
            margin-bottom: 20px;
        }

        .role-switch {
            display: flex;
            margin-bottom: 20px;
        }

        .role-switch button {
            flex: 1;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.5);
            cursor: pointer;
            font-weight: bold;
            background: transparent;
            color: white;
            margin: 0 5px;
            transition: 0.3s;
        }

        .role-switch button.active {
            background: linear-gradient(135deg, #EC4899, #DB2777);
            border: none;
        }

        .role-switch button:hover {
            background: rgba(255,255,255,0.2);
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 8px;
            border: none;
            outline: none;
        }

        .remember {
            display: flex;
            align-items: center;
            font-size: 14px;
            margin-top: 10px;
        }

        .remember input {
            width: auto;
            margin-right: 8px;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            background: linear-gradient(135deg, #EC4899, #DB2777);
            color: white;
            transition: 0.3s;
        }

        .login-btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .register-link {
            display: block;
            margin-top: 15px;
            color: white;
            font-size: 14px;
            text-decoration: none;
            opacity: 0.9;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="card">
    <i class="fa-solid fa-right-to-bracket fa-2x"></i>
    <h2>Login Sistem</h2>
    <div class="subtitle">Masuk sebagai Admin atau Siswa</div>

    <form method="POST" action="/login">
        @csrf

        <div class="role-switch">
            <button type="button" class="active" onclick="setRole('admin', this)">
                <i class="fa-solid fa-user-shield"></i> Admin
            </button>
            <button type="button" onclick="setRole('siswa', this)">
                <i class="fa-solid fa-user-graduate"></i> Siswa
            </button>
        </div>

        <input type="hidden" name="role" id="role" value="admin">

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <div class="remember">
            <input type="checkbox" name="remember">
            Ingat saya
        </div>

        <button type="submit" class="login-btn">
            <i class="fa-solid fa-right-to-bracket"></i> Login
        </button>

        <a href="/register" class="register-link">
            <i class="fa-solid fa-user-plus"></i> Register Siswa
        </a>
    </form>
</div>

<script>
    function setRole(role, el) {
        document.getElementById('role').value = role;

        let buttons = document.querySelectorAll('.role-switch button');
        buttons.forEach(btn => btn.classList.remove('active'));

        el.classList.add('active');
    }
</script>

</body>
</html>