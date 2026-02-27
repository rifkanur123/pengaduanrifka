<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Pengaduan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (Icon) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #5f5fc4, #8b5cf6);
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
        }

        .navbar a {
            color: white !important;
            font-weight: 500;
        }

        /* Card Glass Effect */
        .card-custom {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.2);
        }

        /* Table */
        .table thead {
            background: rgba(255,255,255,0.8);
        }

        .table td {
            vertical-align: middle;
        }

        /* Status Badge */
        .badge-diproses {
            background: #22d3ee;
            color: #000;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
        }

        .badge-selesai {
            background: #198754;
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
        }

        /* Button */
        .btn-search {
            background: #6366f1;
            color: white;
            border-radius: 10px;
        }

        .btn-reset {
            background: #dc3545;
            color: white;
            border-radius: 10px;
        }

        .btn-search:hover,
        .btn-reset:hover {
            opacity: 0.9;
        }

        img {
            border-radius: 10px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="fa fa-school"></i> Pengaduan Sarpras
        </a>

        <div class="ms-auto">
            @if(session('user_id'))
                <a href="/logout" class="btn btn-light btn-sm shadow-sm">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </a>
            @endif
        </div>
    </div>
</nav>

<div class="container py-5">
    @yield('content')
</div>

</body>
</html>