<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Balong Hardi</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --moss-green: #3D5A47;
            --soil-brown: #5C4A3A;
            --river-stone: #E6E2DE;
            --water-blue: #A2C5AC;
            --soft-white: #FBFBF9;
        }

        body {
            background-color: #D9D4CE;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            /* Tekstur kertas/batu halus */
            background-image: radial-gradient(#c5c1bc 1px, transparent 1px);
            background-size: 30px 30px;
            font-family: 'Outfit', sans-serif;
        }

        .nature-card {
            background: var(--soft-white);
            width: 100%;
            max-width: 400px;
            padding: 3rem;
            /* Bentuk organik tidak beraturan */
            border-radius: 60px 40px 50px 30px; 
            border: 2px solid var(--moss-green);
            box-shadow: 10px 10px 0px rgba(61, 90, 71, 0.2);
            position: relative;
        }

        .brand-logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .brand-logo i {
            font-size: 3rem;
            color: var(--moss-green);
            margin-bottom: 1rem;
        }

        .brand-logo h2 {
            font-weight: 600;
            color: var(--moss-green);
            font-size: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            color: var(--soil-brown);
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
        }

        .input-container {
            position: relative;
        }

        .input-container input {
            width: 100%;
            padding: 1rem 1rem 1rem 1rem;
            background: #F1F0ED;
            border: 2px solid transparent;
            border-radius: 20px;
            font-size: 1rem;
            color: var(--moss-green);
            transition: all 0.3s ease;
        }

        .input-container input:focus {
            outline: none;
            border-color: var(--moss-green);
            background: white;
            box-shadow: inset 4px 4px 8px rgba(0,0,0,0.05);
        }

        .remember-check {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--soil-brown);
            font-size: 0.9rem;
            margin-bottom: 2rem;
        }

        .btn-login {
            width: 100%;
            background: var(--moss-green);
            color: white;
            border: none;
            padding: 1.2rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-login:hover {
            background: #2d4234;
            transform: scale(1.02);
        }

        /* Dekorasi elemen daun/ranting */
        .decoration-leaf {
            position: absolute;
            top: -20px;
            left: -20px;
            color: var(--water-blue);
            font-size: 2rem;
            transform: rotate(-30deg);
        }
    </style>
</head>
<body>

    <div class="nature-card">
        <i class="fas fa-leaf decoration-leaf"></i>
        
        <div class="brand-logo">
            <i class="fas fa-fish"></i>
            <h2>Balong Hardi</h2>
        </div>

        @if ($errors->any())
            <div style="color: #bc4749; font-size: 0.8rem; margin-bottom: 1rem; text-align: center; font-weight: 700;">
                <i class="fas fa-exclamation-triangle"></i> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email Akses</label>
                <div class="input-container">
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="admin@balonghardi.com">
                </div>
            </div>

            <div class="form-group">
                <label>Kata Sandi</label>
                <div class="input-container">
                    <input type="password" name="password" required placeholder="••••••••">
                </div>
            </div>

            <label class="remember-check">
                <input type="checkbox" name="remember"> 
                Ingat sesi saya
            </label>

            <button type="submit" class="btn-login">
                Masuk ke Area Admin <i class="fas fa-arrow-right"></i>
            </button>
        </form>
    </div>

</body>
</html>