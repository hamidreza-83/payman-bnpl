@extends('layouts.app')

@section('content')
    <div class="text-center py-16 bg-white rounded-xl shadow-sm mb-12 border-t-4 border-primary">
        <h1 class="text-5xl font-bold text-primary mb-6">امروز بخر، در ۴ قسط پرداخت کن!</h1>
        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">با «پی‌مان» بدون نیاز به ضامن و چک، خریدهای خود را امروز انجام دهید و هزینه آن را در ۴ ماه آینده با خیال راحت بپردازید.</p>
        <a href="#request-form" class="bg-accent hover:bg-teal-700 text-white font-bold py-3 px-8 rounded-full transition shadow-lg inline-block">درخواست اعتبار</a>
    </div>

    <div class="mb-16">
        <h2 class="text-3xl font-bold text-center text-primary mb-10">چرا پی‌مان</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
                <div class="w-16 h-16 mx-auto bg-blue-100 text-primary rounded-full flex items-center justify-center text-2xl font-bold mb-4">۱</div>
                <h3 class="text-xl font-bold mb-2">بدون سود و کارمزد</h3>
                <p class="text-gray-600">قیمت کالا را بدون هیچ هزینه اضافی، دقیقاً همان مبلغی که روی برچسب است پرداخت کنید.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
                <div class="w-16 h-16 mx-auto bg-teal-100 text-accent rounded-full flex items-center justify-center text-2xl font-bold mb-4">۲</div>
                <h3 class="text-xl font-bold mb-2">تایید اعتبار فوری</h3>
                <p class="text-gray-600">فرآیند اعتبارسنجی شما به صورت کاملاً آنلاین و در کمتر از چند دقیقه انجام می‌شود.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
                <div class="w-16 h-16 mx-auto bg-blue-100 text-primary rounded-full flex items-center justify-center text-2xl font-bold mb-4">۳</div>
                <h3 class="text-xl font-bold mb-2">بدون نیاز به ضامن</h3>
                <p class="text-gray-600">نیازی به معرفی ضامن یا ارائه چک و سفته نیست؛ اعتبار شما، رفتار مالی شماست.</p>
            </div>
        </div>
    </div>
@endsection