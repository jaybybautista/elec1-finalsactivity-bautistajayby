<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Enrollment Portal')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f8;
            color: #1a202c;
            min-height: 100vh;
        }

        .navbar {
            background: #1a3a5c;
            color: white;
            padding: 0 32px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .navbar-brand span {
            color: #63b3ed;
        }

        .navbar-links a {
            color: #cbd5e0;
            text-decoration: none;
            margin-left: 24px;
            font-size: 14px;
            transition: color 0.2s;
        }

        .navbar-links a:hover {
            color: white;
        }

        .navbar-links a.logout {
            background: #e53e3e;
            color: white;
            padding: 6px 14px;
            border-radius: 4px;
        }

        .navbar-links a.logout:hover {
            background: #c53030;
        }

        .container {
            max-width: 960px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            padding: 36px;
        }

        .card-title {
            font-size: 20px;
            font-weight: 700;
            color: #1a3a5c;
            margin-bottom: 24px;
            padding-bottom: 12px;
            border-bottom: 2px solid #ebf4ff;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 5px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #cbd5e0;
            border-radius: 5px;
            font-size: 14px;
            color: #2d3748;
            background: #fff;
            transition: border-color 0.2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #3182ce;
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.15);
        }

        .btn {
            display: inline-block;
            padding: 10px 24px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-primary {
            background: #1a3a5c;
            color: white;
        }

        .btn-primary:hover {
            background: #2a4a7c;
        }

        .btn-block {
            width: 100%;
            text-align: center;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 5px;
            margin-bottom: 16px;
            font-size: 14px;
        }

        .alert-error {
            background: #fff5f5;
            border: 1px solid #fc8181;
            color: #c53030;
        }

        .alert-success {
            background: #f0fff4;
            border: 1px solid #68d391;
            color: #276749;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .info-item label {
            color: #718096;
            font-size: 12px;
        }

        .info-item p {
            font-size: 14px;
            font-weight: 600;
            color: #2d3748;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th {
            background: #ebf4ff;
            color: #1a3a5c;
            padding: 10px 12px;
            text-align: left;
            font-size: 13px;
        }

        td {
            padding: 10px 12px;
            border-bottom: 1px solid #f0f4f8;
            color: #4a5568;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .badge {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-blue {
            background: #ebf4ff;
            color: #2b6cb0;
        }

        .badge-green {
            background: #f0fff4;
            color: #276749;
        }

        .badge-red {
            background: #fff5f5;
            color: #c53030;
        }

        .badge-yellow {
            background: #fffff0;
            color: #744210;
        }

        @media (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    @if(session('user_id'))
        <nav class="navbar">
            <div class="navbar-brand">🎓 <span>Enroll</span>Portal</div>
            <div class="navbar-links">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('profile') }}">My Profile</a>
                <a href="{{ route('logout') }}" class="logout">Logout</a>
            </div>
        </nav>
    @endif

    @yield('content')
</body>

</html>
