@extends('layouts.app') 

@section('content')
<div class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
        <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">
            فروشگاه خود را به <span class="text-primary">پی‌مان</span> مجهز کنید
        </h1>
        <p class="mt-4 text-xl text-gray-500 max-w-2xl mx-auto">
            به مشتریان خود اجازه دهید امروز بخرند و در ۴ قسط پرداخت کنند. شما کل مبلغ را فوراً و نقدی از ما تحویل بگیرید!
        </p>
        <div class="mt-8 flex justify-center space-x-4 space-x-reverse">
            <a href="/register?type=merchant" class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-opacity-90 transition">
    شروع همکاری و دریافت API
</a>
            <a href="#benefits" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition">
                مزایای پی‌مان برای فروشگاه‌ها
            </a>
        </div>
    </div>

    <div id="benefits" class="bg-gray-55 py-16 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-12">چرا پذیرندگان پی‌مان را انتخاب می‌کنند؟</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="text-3xl text-primary mb-3">📈</div>
                    <h3 class="text-lg font-bold mb-2">افزایش میانگین سبد خرید</h3>
                    <p class="text-gray-500 text-sm">مشتریان وقتی امکان پرداخت قسطی بدون کارمزد را دارند، تا ۳۰٪ بیشتر خرید می‌کنند.</p>
                </div>
                <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="text-3xl text-primary mb-3">🛡️</div>
                    <h3 class="text-lg font-bold mb-2">ریسک صفر برای شما</h3>
                    <p class="text-gray-500 text-sm">ریسک عدم پرداخت اقساط کاملاً با پی‌مان است؛ شما پول را نقدی دریافت می‌کنید.</p>
                </div>
                <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="text-3xl text-primary mb-3">⚡</div>
                    <h3 class="text-lg font-bold mb-2">اتصال آسان با API</h3>
                    <p class="text-gray-500 text-sm">با چند خط کد یا نصب پلاگین ووکامرس، درگاه پی‌مان روی سایت شما فعال می‌شود.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection