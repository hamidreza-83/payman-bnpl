@extends('layouts.app')

@section('content')
<div class="py-12 bg-light">
    <div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        
        <h2 class="text-2xl font-extrabold text-center text-primary mb-2">ورود به پنل پذیرندگان</h2>
        <p class="text-center text-gray-500 text-sm mb-8">جهت مدیریت درگاه پرداخت و تراکنش‌ها وارد شوید</p>
        
        @if ($errors->any())
            <div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm mb-4 font-medium">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/merchant/login" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">آدرس ایمیل کاری:</label>
                <input type="email" name="email" required class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary text-left" dir="ltr" placeholder="name@company.com">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">کلمه عبور:</label>
                <input type="password" name="password" required class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary text-left" dir="ltr" placeholder="••••••••">
            </div>
            <button type="submit" class="w-full bg-primary text-white py-2.5 rounded-lg font-bold hover:bg-opacity-90 transition">ورود به حساب کاربری</button>
        </form>

        <div class="text-center mt-6 pt-4 border-t border-gray-100 text-sm">
            <span class="text-gray-500">پذیرنده جدید هستید؟</span>
            <a href="/merchant/signup" class="text-accent font-bold hover:underline mr-1">درخواست پنل سازمانی</a>
        </div>

    </div>
</div>
@endsection