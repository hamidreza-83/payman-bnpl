@extends('layouts.app')

@section('content')
<style>
    [x-cloak] { display: none !important; }
</style>

<div
    class="py-12 bg-light"
    x-data="{ step: 1, email: '', website: '', terms: false, bizName: '', bizType: 'clothing', bizSales: '' }"
    x-cloak
>
    <div class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-100">

        <h1 class="text-2xl font-extrabold text-center text-primary mb-2">درخواست پنل سازمانی پی‌مان</h1>
        <p class="text-center text-gray-500 text-sm mb-8">به شبکه پذیرندگان بزرگترین پلتفرم BNPL ملحق شوید</p>

        <div class="flex items-center justify-between mb-8 border-b pb-4 text-xs md:text-sm font-medium text-gray-400">
            <span :class="step >= 1 ? 'text-primary font-bold border-b-2 border-primary pb-1' : ''">۱. اطلاعات اولیه</span>
            <span>&larr;</span>
            <span :class="step >= 2 ? 'text-primary font-bold border-b-2 border-primary pb-1' : ''">۲. قوانین</span>
            <span>&larr;</span>
            <span :class="step >= 3 ? 'text-primary font-bold border-b-2 border-primary pb-1' : ''">۳. مشخصات فروشگاه</span>
            <span>&larr;</span>
            <span :class="step === 4 ? 'text-primary font-bold border-b-2 border-primary pb-1' : ''">۴. اطلاعات مالک</span>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm mb-4 font-medium">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/merchant/signup" method="POST">
            @csrf

            {{-- Step 1: Basic info --}}
            <div x-show="step === 1">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">آدرس ایمیل کاری:</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        x-model="email"
                        class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary text-left"
                        dir="ltr"
                        placeholder="name@company.com"
                    >
                </div>
                <div class="mb-6">
                    <label for="website" class="block text-gray-700 text-sm font-bold mb-2">آدرس وبسایت فروشگاه:</label>
                    <input
                        type="text"
                        id="website"
                        name="website"
                        x-model="website"
                        class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary text-left"
                        dir="ltr"
                        placeholder="digikala.com"
                    >
                </div>
                <button
                    type="button"
                    x-on:click="if (email.trim() !== '' && website.trim() !== '') { step = 2 } else { alert('لطفاً ابتدا ایمیل و آدرس وبسایت را وارد کنید.') }"
                    class="w-full bg-primary text-white py-2.5 rounded-lg font-bold hover:bg-opacity-90 transition"
                >
                    مرحله بعدی
                </button>
            </div>

            <div x-show="step === 2" x-cloak>
                <div class="bg-gray-50 p-4 rounded-lg text-sm text-gray-600 leading-relaxed mb-6 max-h-48 overflow-y-auto border border-gray-100">
                    <p class="mb-2 font-bold text-gray-800">شروط پذیرش فروشگاه‌ها در پی‌مان:</p>
                    <p class="mb-2">۱. فروشگاه متعهد می‌شود کالاها را با همان قیمت نقدی و بدون افزایش قیمت به مشتریان اعتباری عرضه کند.</p>
                    <p class="mb-2">۲. تسویه‌حساب با فروشگاه‌ها طی ۲۴ ساعت کاری پس از نهایی شدن خرید انجام می‌شود.</p>
                    <p>۳. ریسک عدم پرداخت اقساط توسط مشتریان کاملاً بر عهده پی‌مان است و فروشگاه تعهدی ندارد.</p>
                </div>
                <div class="mb-6 flex items-center">
                    <input type="checkbox" id="terms_check" x-model="terms" class="rounded text-primary focus:ring-primary h-4 w-4">
                    <label for="terms_check" class="mr-2 text-sm text-gray-700 font-medium">شرایط و قوانین بالا را مطالعه کرده و قبول دارم.</label>
                </div>
                <div class="flex space-x-4 space-x-reverse">
                    <button
                        type="button"
                        x-on:click="step = 1"
                        class="w-1/2 bg-gray-100 text-gray-700 py-2.5 rounded-lg font-bold hover:bg-gray-200 transition"
                    >
                        قبلی
                    </button>
                    <button
                        type="button"
                        x-on:click="if (terms) { step = 3 } else { alert('لطفاً ابتدا تیک قبول قوانین را بزنید.') }"
                        class="w-1/2 bg-primary text-white py-2.5 rounded-lg font-bold hover:bg-opacity-90 transition"
                    >
                        مرحله بعدی
                    </button>
                </div>
            </div>

            <div x-show="step === 3" x-cloak>
                <div class="mb-4">
                    <label for="biz_name" class="block text-gray-700 text-sm font-bold mb-2">نام تجاری / نام فروشگاه:</label>
                    <input
                        type="text"
                        id="biz_name"
                        name="biz_name"
                        x-model="bizName"
                        class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary"
                        placeholder="مثلا: پوشاک تن‌پوش"
                    >
                </div>
                <div class="mb-4">
                    <label for="biz_type" class="block text-gray-700 text-sm font-bold mb-2">حوزه فعالیت:</label>
                    <select
                        id="biz_type"
                        name="biz_type"
                        x-model="bizType"
                        class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary"
                    >
                        <option value="clothing">پوشاک و لباس</option>
                        <option value="electronics">دیجیتال و الکترونیک</option>
                        <option value="beauty">آرایشی و بهداشتی</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="biz_sales" class="block text-gray-700 text-sm font-bold mb-2">میانگین فروش ماهیانه شما:</label>
                    <select
                        id="biz_sales"
                        name="biz_sales"
                        x-model="bizSales"
                        class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary"
                    >
                        <option value="">انتخاب کنید...</option>
                        <option value="under_50">کمتر از ۵۰ میلیون تومان</option>
                        <option value="50_200">بین ۵۰ تا ۲۰۰ میلیون تومان</option>
                        <option value="above_200">بالای ۲۰۰ میلیون تومان</option>
                    </select>
                </div>
                <div class="flex space-x-4 space-x-reverse">
                    <button
                        type="button"
                        x-on:click="step = 2"
                        class="w-1/2 bg-gray-100 text-gray-700 py-2.5 rounded-lg font-bold hover:bg-gray-200 transition"
                    >
                        قبلی
                    </button>
                    <button
                        type="button"
                        x-on:click="if (bizName.trim() !== '' && bizType !== '' && bizSales !== '') { step = 4 } else { alert('لطفاً تمامی مشخصات فروشگاه را تکمیل کنید.') }"
                        class="w-1/2 bg-primary text-white py-2.5 rounded-lg font-bold hover:bg-opacity-90 transition"
                    >
                        مرحله بعدی
                    </button>
                </div>
            </div>

            {{-- Step 4: Owner info --}}
            <div x-show="step === 4" x-cloak>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">نام و نام خانوادگی مالک کسب‌وکار:</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        required
                        class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary"
                    >
                </div>
                <div class="mb-4">
                    <label for="owner_phone" class="block text-gray-700 text-sm font-bold mb-2">شماره موبایل مالک:</label>
                    <input
                        type="text"
                        id="owner_phone"
                        name="owner_phone"
                        required
                        class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary text-left"
                        dir="ltr"
                        placeholder="09151234567"
                    >
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">کلمه عبور برای لاگین‌های بعدی:</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary text-left"
                        dir="ltr"
                    >
                </div>
                <div class="flex space-x-4 space-x-reverse">
                    <button
                        type="button"
                        x-on:click="step = 3"
                        class="w-1/2 bg-gray-100 text-gray-700 py-2.5 rounded-lg font-bold hover:bg-gray-200 transition"
                    >
                        قبلی
                    </button>
                    <button
                        type="submit"
                        class="w-1/2 bg-accent text-white py-2.5 rounded-lg font-bold hover:bg-opacity-90 transition shadow-md"
                    >
                        شروع همکاری و دریافت API
                    </button>
                </div>
            </div>
        </form>

        <div class="text-center mt-6 pt-4 border-t border-gray-100 text-sm">
            <span class="text-gray-500">از قبل حساب کاربری دارید؟</span>
            <a href="/merchant/login" class="text-primary font-bold hover:underline mr-1">ورود به پنل پذیرندگان</a>
        </div>

    </div>
</div>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.9/dist/cdn.min.js"></script>
@endsection
