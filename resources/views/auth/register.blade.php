<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register - Green Wiyata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #eef6d4;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-card {
            background-color: #6c6c6c;
            padding: 30px 35px;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }
        .register-card h2 {
            color: black;
            margin-bottom: 25px;
            text-align: center;
        }
        .form-control {
            background-color: #c9e3c9 !important;
        }
        .btn-confirm {
            background-color: #c2f07d;
            font-weight: 600;
        }
        .btn-confirm:hover {
            background-color: #a6d468;
        }
        a {
            color: #c2f07d;
            text-decoration: none;
            font-weight: 600;
        }
        a:hover {
            color: #a6d468;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-card">
    <h2>Account Registration</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <input type="text" name="name" placeholder="Input Username" required
                   class="form-control" />
        </div>

        <div class="mb-3">
            <input type="email" name="email" placeholder="Email" required
                   class="form-control" />
        </div>

        <div class="mb-3">
            <input type="password" name="password" placeholder="Input Password" required
                   class="form-control" />
        </div>

        <div class="mb-3">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                   class="form-control" />
        </div>

        <button type="submit" class="btn btn-confirm w-100">Confirm</button>
    </form>

    <p class="mt-3 text-center text-white">
        Already have an account? <a href="{{ route('login') }}">Log in</a>
    </p>
</div>

</body>
</html>
