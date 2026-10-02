<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - AudioFile</title>
    
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}?v=2.0">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=2.0">

    <style>
        * { box-sizing: border-box; }
        body {
            background-color: #13161F;
            color: #FFFFFF;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding-bottom: 50px;
        }
        .navbar {
            background-color: #1E2433;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            position: sticky;
            top: 0;
            z-index: 100;
            width: 100%;
        }
        .nav-brand {
            font-size: 20px;
            font-weight: bold;
            color: #2CE4F5;
            text-decoration: none;
        }
        .nav-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .nav-links a {
            color: #6A7B92;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: color 0.2s;
        }
        .nav-links a:hover, .nav-links a.active {
            color: #FFFFFF;
        }
        .nav-btn-action {
            background: linear-gradient(to right, #2CE4F5, #67F4CE);
            color: #13161F !important;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: bold !important;
        }
        .nav-btn-action:hover { opacity: 0.9; }
        .profile-badge {
            background-color: #151924;
            padding: 8px 15px;
            border-radius: 20px;
            border: 1px solid rgba(44, 228, 245, 0.3);
            color: #2CE4F5 !important;
            font-weight: 600;
            font-size: 13px;
        }
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }
        h2.section-title {
            font-size: 22px;
            margin-bottom: 15px;
            font-weight: 700;
            border-left: 4px solid #2CE4F5;
            padding-left: 10px;
        }
        .card-grid {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            padding-bottom: 15px;
            scroll-behavior: smooth;
        }
        .card-grid::-webkit-scrollbar { height: 6px; }
        .card-grid::-webkit-scrollbar-thumb { background-color: #1E2433; border-radius: 3px; }
        .music-card {
            background-color: #1E2433;
            border-radius: 12px;
            min-width: 180px;
            max-width: 180px;
            padding: 15px;
            flex-shrink: 0;
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
            transition: transform 0.2s, background-color 0.2s;
            cursor: pointer;
        }
        .music-card:hover {
            transform: translateY(-5px);
            background-color: #252D42;
        }
        .card-img {
            width: 100%;
            height: 150px;
            background-color: #151924;
            border-radius: 8px;
            object-fit: cover;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6A7B92;
            font-size: 12px;
        }
        .card-title {
            font-size: 14px;
            font-weight: bold;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 4px;
        }
        .card-subtitle {
            font-size: 12px;
            color: #6A7B92;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .section-wrapper { margin-bottom: 40px; }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ route('home') }}" class="nav-brand">AudioFile</a>
        <div class="nav-links" id="nav-links-container">
            <a href="{{ route('home') }}" class="active">Inicio</a>
        </div>
    </nav>

    <div class="container">
        <div class="section-wrapper">
            <h2 class="section-title">Accesos Directos & Recientes</h2>
            <div class="card-grid">
                <div class="music-card">
                    <div class="card-img">Favorito</div>
                    <div class="card-title">Mi Playlist</div>
                    <div class="card-subtitle">Personal</div>
                </div>
            </div>
        </div>

        <div class="section-wrapper">
            <h2 class="section-title">Lo más escuchado</h2>
            <div class="card-grid">
                <div class="music-card">
                    <div class="card-img">Trending</div>
                    <div class="card-title">Popular Track</div>
                    <div class="card-subtitle">Global Hits</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const token = localStorage.getItem('auth_token');
            const userData = JSON.parse(localStorage.getItem('user_data') || '{}');
            const navContainer = document.getElementById('nav-links-container');

            if (!navContainer) return;

            const currentPath = window.location.pathname;
            let htmlLinks = `<a href="{{ route('home') }}" class="${currentPath === '/home' ? 'active' : ''}">Inicio</a>`;

            if (token) {
                const profileName = userData.name || 'Mi Perfil';
                htmlLinks += `<span class="profile-badge">👤 ${profileName}</span>`;
                htmlLinks += `<a href="#" onclick="cerrarSesion()" style="color: #ff6b6b;">Salir</a>`;
            } else {
                htmlLinks += `<a href="{{ route('login') }}" class="${currentPath.includes('login') ? 'active' : ''}">Log In</a>`;
                htmlLinks += `<a href="{{ route('register') }}" class="nav-btn-action ${currentPath.includes('register') ? 'active' : ''}">Sign Up</a>`;
            }

            navContainer.innerHTML = htmlLinks;
        });

        function cerrarSesion() {
            localStorage.removeItem('auth_token');
            localStorage.removeItem('user_data');
            window.location.href = '/login';
        }
    </script>
</body>
</html>