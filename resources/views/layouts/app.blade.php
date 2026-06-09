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
                    primary: '#5bb1f2',    
                    primaryDark: '#12268A', 
                    accent: '#00A693',      
                    accentDark: '#008777',  
                    saffron: '#F9A602',     
                    light: '#F8FAFC',       
                    textMain: '#0F172A',   
                }
            }
        }
    }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;700;900&display=swap');
        body { font-family: 'Vazirmatn', sans-serif; }
    </style>
</head>
<body class="bg-light text-textMain flex flex-col min-h-screen">

    <header class="bg-white shadow-md sticky top-0 z-50 border-b-2 border-accent">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-3xl font-black text-primary tracking-tight">پی‌مان</div>
            
            <nav class="hidden md:flex space-x-8 space-x-reverse font-bold text-sm">
                <a href="{{ route('home') }}" class="text-textMain hover:text-accent transition">خانه</a>
                <a href="{{ route('about') }}" class="text-textMain hover:text-accent transition">درباره ما</a>
                <a href="{{ route('faq') }}" class="text-textMain hover:text-accent transition">سوالات متداول</a>
            </nav>

            <div class="flex items-center space-x-4 space-x-reverse">
                <a href="#" class="text-sm font-bold text-primary hover:text-primaryDark">ورود</a>
                <a href="#" class="bg-accent text-white text-sm font-bold px-6 py-2.5 rounded-lg shadow-lg shadow-teal-500/30 hover:bg-accentDark transition">دریافت اعتبار</a>
            </div>
        </div>
    </header>

    <main class="flex-grow container mx-auto px-6 py-12">
        @yield('content')
    </main>

    <footer class="bg-primary text-blue-100 py-8 text-center mt-12 border-t-4 border-saffron relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjEiIGZpbGw9IiNmZmYiLz48L3N2Zz4=')]"></div>
        <p class="relative z-10 text-sm font-medium">&copy; 2026 پلتفرم اعتباری پی‌مان. تمامی حقوق محفوظ است</p>
    </footer>

</body>
</html>