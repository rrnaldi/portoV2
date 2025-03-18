<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    @vite('resources/css/app.css') <!-- Pastikan Tailwind sudah dikonfigurasi -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://kit.fontawesome.com/YOUR_FA_KIT_CODE.js" crossorigin="anonymous"></script>
</head>
<body class="min-h-screen flex flex-col items-center justify-center font-poppins" style="background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);">

    <div class="stars"></div>
    <div class="moon"></div>
    
    @include('layout.navbar') <!-- Navbar tetap di atas -->
    
    <div class="w-full h-full flex flex-col justify-center items-center pt-20">
        @yield('content') <!-- Konten dari halaman -->
    </div>

    <script>
        function createStars() {
            const starContainer = document.querySelector('.stars');
            for (let i = 0; i < 100; i++) {
                let star = document.createElement('div');
                star.className = 'star';
                star.style.top = Math.random() * 100 + 'vh';
                star.style.left = Math.random() * 100 + 'vw';
                star.style.animationDuration = (Math.random() * 2 + 1) + 's';
                starContainer.appendChild(star);
            }
        }
        createStars();
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
      </script>
</body>
</html>
