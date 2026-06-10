<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payman | الان بخر، بعداً پرداخت کن</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e3a8a', 
                        accent: '#0d9488',  
                        light: '#f8fafc',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap');
        body { font-family: 'Vazirmatn', sans-serif; }
    </style>
    <link rel="icon" type="image/png" href="{{ asset('icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="bg-light text-gray-800 flex flex-col min-h-screen">

    <header class="bg-primary text-white shadow-md">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        
        <div class="flex items-center space-x-8 space-x-reverse">
            <a href="{{ route('home') }}"><div class="text-2xl font-bold text-accent">پی‌مان</div></a>
            <nav class="space-x-6 space-x-reverse">
                <a href="{{ route('home') }}" class="hover:text-accent transition">خانه</a>
                <a href="{{ route('faq') }}" class="hover:text-accent transition">سوالات متداول</a>
                <a href="{{ route('about') }}" class="hover:text-accent transition">درباره ما</a>
                <a href="{{ route('contact') }}" class="hover:text-accent transition">تماس با ما</a>
            </nav>
        </div>

        <div>
            <button type="button" class="border-2 border-accent text-accent hover:bg-accent hover:text-white font-bold py-2 px-6 rounded-full transition-all duration-300">
                ورود
            </button>
        </div>

    </div>
</header>

    <main class="flex-grow container mx-auto px-6 py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-gray-400 py-6 text-center mt-12">
        <p>&copy; 2026 پلتفرم اعتباری پی‌مان. تمامی حقوق محفوظ است.</p>
    </footer>

</body>
</html>