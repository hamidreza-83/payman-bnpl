<style>
    [x-cloak] { display: none !important; }
</style>

@extends('layouts.app')

@section('content')
<div class="py-12 bg-light" x-data="{
    step: 1,
    email: '',
    website: '',
    termsAccepted: false,
    storeName: '',
    activity: '',
    monthlySales: '',
    ownerName: '',
    ownerMobile: '',
    errors: {},

    clearErrors() {
        this.errors = {};
    },

    isValidEmail(value) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value.trim());
    },

    isValidDomain(value) {
        const domain = value.trim().replace(/^https?:\/\//i, '').replace(/\/.*$/, '');
        return /^[a-zA-Z0-9]([a-zA-Z0-9-]*[a-zA-Z0-9])?(\.[a-zA-Z0-9]([a-zA-Z0-9-]*[a-zA-Z0-9])?)+$/.test(domain);
    },

    isValidMobile(value) {
        return /^09\d{9}$/.test(value.trim());
    },

    validateStep1() {
        this.clearErrors();
        let valid = true;

        if (!this.email.trim()) {
            this.errors.email = 'لطفاً آدرس ایمیل کاری را وارد کنید.';
            valid = false;
        } else if (!this.isValidEmail(this.email)) {
            this.errors.email = 'فرمت ایمیل معتبر نیست.';
            valid = false;
        }

        if (!this.website.trim()) {
            this.errors.website = 'لطفاً آدرس وبسایت فروشگاه را وارد کنید.';
            valid = false;
        } else if (!this.isValidDomain(this.website)) {
            this.errors.website = 'فرمت دامنه معتبر نیست. مثال: digikala.com';
            valid = false;
        }

        return valid;
    },

    validateStep2() {
        this.clearErrors();

        if (!this.termsAccepted) {
            this.errors.terms = 'لطفاً شرایط و قوانین را بپذیرید.';
            return false;
        }

        return true;
    },

    validateStep3() {
        this.clearErrors();
        let valid = true;

        if (!this.storeName.trim()) {
            this.errors.storeName = 'لطفاً نام تجاری فروشگاه را وارد کنید.';
            valid = false;
        }

        if (!this.activity) {
            this.errors.activity = 'لطفاً حوزه فعالیت را انتخاب کنید.';
            valid = false;
        }

        if (!this.monthlySales) {
            this.errors.monthlySales = 'لطفاً میانگین فروش ماهیانه را انتخاب کنید.';
            valid = false;
        }

        return valid;
    },

    validateStep4() {
        this.clearErrors();
        let valid = true;

        if (!this.ownerName.trim()) {
            this.errors.ownerName = 'لطفاً نام و نام خانوادگی مالک را وارد کنید.';
            valid = false;
        }

        if (!this.ownerMobile.trim()) {
            this.errors.ownerMobile = 'لطفاً شماره موبایل مالک را وارد کنید.';
            valid = false;
        } else if (!this.isValidMobile(this.ownerMobile)) {
            this.errors.ownerMobile = 'شماره موبایل معتبر نیست. مثال: 09151234567';
            valid = false;
        }

        return valid;
    },

    nextStep() {
        if (this.step === 1 && this.validateStep1()) {
            this.step = 2;
        } else if (this.step === 2 && this.validateStep2()) {
            this.step = 3;
        } else if (this.step === 3 && this.validateStep3()) {
            this.step = 4;
        }
    },

    prevStep() {
        if (this.step > 1) {
            this.clearErrors();
            this.step--;
        }
    },

    onFormSubmit(event) {
        if (this.step !== 4 || !this.validateStep4()) {
            event.preventDefault();
            return;
        }

        alert('درخواست شما با موفقیت ثبت شد! کارشناسان پی‌مان تا ۲۴ ساعت آینده جهت احراز هویت و تحویل API Key با شما تماس خواهند گرفت.');
    }
}">
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
            <span :class="step == 4 ? 'text-primary font-bold border-b-2 border-primary pb-1' : ''">۴. اطلاعات مالک</span>
        </div>

        <form action="{{ route('merchant.store') }}" method="POST" novalidate @submit="onFormSubmit($event)">
            
            <div x-show="step === 1">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">آدرس ایمیل کاری:</label>
                    <input type="email" name="email" x-model="email" class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary" placeholder="name@company.com">
                    <p x-show="errors.email" x-text="errors.email" class="text-red-500 text-xs mt-1"></p>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">آدرس وبسایت فروشگاه:</label>
                    <input type="text" name="website" x-model="website" id="merchant_website" class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary text-left" dir="ltr" placeholder="digikala.com">
                    <p x-show="errors.website" x-text="errors.website" class="text-red-500 text-xs mt-1"></p>
                </div>
                <button type="button" @click="nextStep()" class="w-full bg-primary text-white py-2.5 rounded-lg font-bold hover:bg-opacity-90 transition">مرحله بعدی</button>
            </div>

            <div x-show="step === 2" x-cloak>
                <div class="bg-gray-55 p-4 rounded-lg text-sm text-gray-600 leading-relaxed mb-6 max-h-48 overflow-y-auto border border-gray-100">
                    <p class="mb-2 font-bold text-gray-800">شروط پذیرش فروشگاه‌ها در پی‌مان:</p>
                    <p class="mb-2">۱. فروشگاه متعهد می‌شود کالاها را با همان قیمت نقدی و بدون افزایش قیمت به مشتریان اعتباری عرضه کند.</p>
                    <p class="mb-2">۲. تسویه‌حساب با فروشگاه‌ها طی ۲۴ ساعت کاری پس از نهایی شدن خرید انجام می‌شود.</p>
                    <p>۳. ریسک عدم پرداخت اقساط توسط مشتریان کاملاً بر عهده پی‌مان است و فروشگاه تعهدی ندارد.</p>
                </div>
                <div class="mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="terms" x-model="termsAccepted" class="rounded text-primary focus:ring-primary h-4 w-4">
                        <label for="terms" class="mr-2 text-sm text-gray-700 font-medium">شرایط و قوانین بالا را مطالعه کرده و قبول دارم.</label>
                    </div>
                    <p x-show="errors.terms" x-text="errors.terms" class="text-red-500 text-xs mt-1"></p>
                </div>

                <div class="flex space-x-4 space-x-reverse">
                    <button type="button" @click="prevStep()" class="w-1/2 bg-gray-100 text-gray-700 py-2.5 rounded-lg font-bold hover:bg-gray-200 transition">قبلی</button>
                    <button type="button" @click="nextStep()" class="w-1/2 bg-primary text-white py-2.5 rounded-lg font-bold hover:bg-opacity-90 transition">مرحله بعدی</button>
                </div>
            </div>

            <div x-show="step === 3" x-cloak>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">نام تجاری / نام فروشگاه:</label>
                    <input type="text" name="biz_name" x-model="storeName" class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary" placeholder="مثلا: پوشاک تن‌پوش">
                    <p x-show="errors.storeName" x-text="errors.storeName" class="text-red-500 text-xs mt-1"></p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">حوزه فعالیت:</label>
                    <select x-model="activity" name="biz_type" class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary">
                        <option value="">انتخاب کنید...</option>
                        <option value="clothing">پوشاک و لباس</option>
                        <option value="electronics">دیجیتال و الکترونیک</option>
                        <option value="beauty">آرایشی و بهداشتی</option>
                    </select>
                    <p x-show="errors.activity" x-text="errors.activity" class="text-red-500 text-xs mt-1"></p>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">میانگین فروش ماهیانه :</label>
                    <select name="biz_sales" x-model="monthlySales" class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary">
                        <option value="">انتخاب کنید...</option>
                        <option value="under_50">کمتر از ۵۰ میلیون تومان</option>
                        <option value="50_200">بین ۵۰ تا ۲۰۰ میلیون تومان</option>
                        <option value="above_200">بالای ۲۰۰ میلیون تومان</option>
                    </select>
                    <p x-show="errors.monthlySales" x-text="errors.monthlySales" class="text-red-500 text-xs mt-1"></p>
                </div>

                <div class="flex space-x-4 space-x-reverse">
                    <button type="button" @click="prevStep()" class="w-1/2 bg-gray-100 text-gray-700 py-2.5 rounded-lg font-bold hover:bg-gray-200 transition">قبلی</button>
                    <button type="button" @click="nextStep()" class="w-1/2 bg-primary text-white py-2.5 rounded-lg font-bold hover:bg-opacity-90 transition">مرحله بعدی</button>
                </div>
            </div>

            <div x-show="step === 4" x-cloak>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">نام و نام خانوادگی مالک کسب‌وکار:</label>
                    <input name="name" type="text" x-model="ownerName" class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary">
                    <p x-show="errors.ownerName" x-text="errors.ownerName" class="text-red-500 text-xs mt-1"></p>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">شماره موبایل:</label>
                    <input name="owner_phone" type="text" x-model="ownerMobile" class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary text-left" dir="ltr" placeholder="09151234567">
                    <p x-show="errors.ownerMobile" x-text="errors.ownerMobile" class="text-red-500 text-xs mt-1"></p>
                </div>
                <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">کلمه عبور : </label>
    <input type="password" name="password" required class="w-full border rounded-lg p-2.5 focus:outline-none focus:border-primary">
</div>
                <div class="flex space-x-4 space-x-reverse">
                    <button type="button" @click="prevStep()" class="w-1/2 bg-gray-100 text-gray-700 py-2.5 rounded-lg font-bold hover:bg-gray-200 transition">قبلی</button>
                    <button type="submit" class="w-1/2 bg-accent text-white py-2.5 rounded-lg font-bold hover:bg-opacity-90 transition shadow-md">ثبت و ارسال درخواست</button>
                </div>
            </div>

        </form>
    </div>
</div>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
@endsection
