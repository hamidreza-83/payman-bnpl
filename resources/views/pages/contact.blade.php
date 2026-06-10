@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto mb-16">
        <h1 class="text-4xl font-bold text-primary mb-2 text-center">آیا به کمک نیاز دارید؟</h1>
        <p class="text-center text-gray-500 mb-12">لطفاً از بین گزینه‌های زیر، بخش مورد نظر خود را انتخاب کنید تا سریع‌تر پاسخ بگیرید.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow contact-box" >
                <div class="w-12 h-12 bg-blue-50 text-primary rounded-lg flex items-center justify-center text-2xl mb-6">🎧</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">خدمات مشتریان</h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    سریع‌ترین راه برای دریافت پشتیبانی در مورد اقساط، پرداخت‌ها، بازگشت وجه و سایر موارد مربوط به کاربران، تماس با پشتیبانی مشتریان ماست.
                </p>
                <a href="#" class="text-accent font-bold hover:underline flex items-center">
                    ارتباط با خدمات مشتریان <span class="mr-2">&larr;</span>
                </a>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow contact-box">
                <div class="w-12 h-12 bg-teal-50 text-accent rounded-lg flex items-center justify-center text-2xl mb-6">🏪</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">پشتیبانی فروشندگان (پذیرندگان)</h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    کسب‌وکار خود را رونق دهید! برای یافتن اطلاعات تماس، ساعات کاری و پاسخ به متداول‌ترین سوالات پذیرندگان، به صفحه فروشندگان مراجعه کنید.
                </p>
                <a href="#" class="text-accent font-bold hover:underline flex items-center">
                    ورود به پرتال پذیرندگان <span class="mr-2">&larr;</span>
                </a>
            </div>

                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow contact-box">
                <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center text-2xl mb-6">💬</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">بازخورد و روابط عمومی</h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    تجربه خود را با ما در میان بگذارید. نظر شما برای ما مهم است. همچنین برای دریافت اخبار شرکت و کیت رسانه‌ای پی‌مان به صفحه پرس مراجعه کنید.
                </p>
                <a href="mailto:feedback@payman-bnpl.ir" class="text-accent font-bold hover:underline flex items-center">
                    ارسال ایمیل: feedback@payman-bnpl.ir <span class="mr-2">&larr;</span>
                </a>
            </div>

        </div>

        <div class="mt-12 bg-gray-50 rounded-xl p-8 border border-gray-200">
            <h3 class="text-2xl font-bold text-gray-800 mb-6  border-b border-gray-200 pb-4">آدرس دفاتر</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-center md:text-right">
                
                <div class="flex flex-col items-center md:items-start">
                    <span class="text-3xl text-gray-400 mb-3">🏢</span>
                    <h4 class="font-bold text-gray-800 text-lg mb-2">دفتر مرکزی (مشهد)</h4>
                    <p class="text-gray-600 leading-relaxed">
                        شرکت خدمات اعتباری پی‌مان<br>
                        مشهد بلوار دستغیب،  <br>
                        <br>
                    </p>
                </div>

                <div class="flex flex-col items-center md:items-start ">
                    <span class="text-3xl text-gray-400 mb-3">🗄️</span>
                    <h4 class="font-bold text-gray-800 text-lg mb-2">دفتر پشتیبانی و عملیات</h4>
                    <p class="text-gray-600 leading-relaxed">
                           مشهد, پارک علم و فناوری<br>
                    </p>
                </div>

            </div>
        </div>

    </div>
@endsection 