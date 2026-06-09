@extends('layouts.app')

@section('content')
    <div class="text-center py-16 mb-12 relative z-10">
        <h1 class="text-5xl font-bold text-textBlue mb-6">امروز بخر، در ۴ قسط پرداخت کن!</h1>
        <p class="text-xl text-gray-400 mb-8 max-w-2xl mx-auto">با «پی‌مان» بدون نیاز به ضامن و چک، خریدهای خود را امروز انجام دهید و هزینه آن را در ۴ ماه آینده با خیال راحت بپردازید.</p>
        
        <button onclick="openModal()" class="bg-accent hover:bg-teal-600 text-white font-bold py-3 px-8 rounded-full transition shadow-lg shadow-teal-500/20 request-credit">درخواست اعتبار</button>
    </div>

    <div class="mb-16 relative z-10">
        <h2 class="text-3xl font-bold text-center text-textBlue mb-10">چرا پی‌مان</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-cardBg p-6 rounded-xl border border-cardBorder text-center">
                <div class="w-16 h-16 mx-auto bg-primary text-white rounded-full flex items-center justify-center text-2xl font-bold mb-4">۱</div>
                <h3 class="text-xl font-bold text-gray-500 mb-2">بدون سود و کارمزد</h3>
                <p class="text-gray-400 text-sm">قیمت کالا را بدون هیچ هزینه اضافی پرداخت کنید.</p>
            </div>
            <div class="bg-cardBg p-6 rounded-xl border border-cardBorder text-center">
                <div class="w-16 h-16 mx-auto bg-accent text-white rounded-full flex items-center justify-center text-2xl font-bold mb-4">۲</div>
                <h3 class="text-xl font-bold text-gray-500 mb-2">تایید اعتبار فوری</h3>
                <p class="text-gray-400 text-sm">فرآیند اعتبارسنجی شما کاملاً آنلاین انجام می‌شود.</p>
            </div>
            <div class="bg-cardBg p-6 rounded-xl border border-cardBorder text-center">
                <div class="w-16 h-16 mx-auto bg-primary text-white rounded-full flex items-center justify-center text-2xl font-bold mb-4">۳</div>
                <h3 class="text-xl font-bold text-gray-500 mb-2">بدون نیاز به ضامن</h3>
                <p class="text-gray-400 text-sm">نیازی به معرفی ضامن یا ارائه چک و سفته نیست.</p>
            </div>
        </div>
    </div>

    <div id="creditModal" class="{{ (session('success') || $errors->any()) ? 'flex' : 'hidden' }} fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-70 backdrop-blur-sm px-4">
        
        <div class="bg-cardBg p-8 rounded-xl shadow-2xl border-t-4 border-accent w-full max-w-md relative transform transition-all">
            
            <button onclick="closeModal()" class="absolute top-4 left-4 text-gray-400 hover:text-white text-2xl font-bold">&times;</button>

            <h2 class="text-2xl font-bold text-textBlue mb-6 text-center">درخواست اولیه اعتبار</h2>
            
            @if(session('success'))
                <div class="bg-teal-900 border border-teal-500 text-teal-200 px-4 py-3 rounded mb-6 text-center font-bold">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('credit.request') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-300 text-sm font-bold mb-2">نام و نام خانوادگی:</label>
                    <input type="text" name="name" class="w-full bg-gray-800 border border-cardBorder rounded-lg py-2 px-3 text-white focus:outline-none focus:border-accent" value="{{ old('name') }}">
                    @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 text-sm font-bold mb-2">شماره موبایل:</label>
                    <input type="text" name="phone" class="w-full bg-gray-800 border border-cardBorder rounded-lg py-2 px-3 text-white focus:outline-none focus:border-accent text-left" dir="ltr" value="{{ old('phone') }}">
                    @error('phone') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-8">
                    <label class="block text-gray-300 text-sm font-bold mb-2">مبلغ درخواستی (تومان):</label>
                    <input type="number" name="amount" class="w-full bg-gray-800 border border-cardBorder rounded-lg py-2 px-3 text-white focus:outline-none focus:border-accent text-left" dir="ltr" value="{{ old('amount') }}">
                    @error('amount') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full bg-accent hover:bg-teal-600 text-white font-bold py-3 px-4 rounded-lg transition">ثبت اطلاعات</button>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            const modal = document.getElementById('creditModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden'; 
        }

        function closeModal() {
            const modal = document.getElementById('creditModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';  
        }
    </script>
@endsection