<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Enrollment Portal')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f8;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 480px;
            padding: 20px;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 28px;
        }
        .auth-header .logo {
            font-size: 28px;
            font-weight: 800;
            color: #1a3a5c;
            letter-spacing: -0.5px;
        }
        .auth-header .logo span { color: #3182ce; }
        .auth-header p {
            color: #718096;
            font-size: 14px;
            margin-top: 4px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 36px;
        }
        .card-title {
            font-size: 18px;
            font-weight: 700;
            color: #1a3a5c;
            margin-bottom: 20px;
        }

        .form-group { margin-bottom: 14px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 4px;
        }
        input, select {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #cbd5e0;
            border-radius: 5px;
            font-size: 14px;
            color: #2d3748;
            transition: border-color 0.2s;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #3182ce;
            box-shadow: 0 0 0 3px rgba(49,130,206,0.15);
        }

        .btn {
            width: 100%;
            padding: 11px;
            background: #1a3a5c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
            transition: background 0.2s;
        }
        .btn:hover { background: #2a4a7c; }

        .alert-error {
            background: #fff5f5;
            border: 1px solid #fc8181;
            color: #c53030;
            border-radius: 5px;
            padding: 10px 14px;
            margin-bottom: 14px;
            font-size: 13px;
        }
        .auth-footer {
            text-align: center;
            margin-top: 18px;
            font-size: 13px;
            color: #718096;
        }
        .auth-footer a { color: #3182ce; text-decoration: none; font-weight: 600; }
        .auth-footer a:hover { text-decoration: underline; }

        .auth-wrapper.wide { max-width: 640px; }

        @media (max-width: 520px) {
            .form-row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="auth-wrapper @yield('wrapper-class')">
        <div class="auth-header">
            <div class="logo">🎓 Enroll<span>Portal</span></div>
            <p>Student Enrollment Management System</p>
        </div>

        @yield('content')
    </div>
</body>
</html>
