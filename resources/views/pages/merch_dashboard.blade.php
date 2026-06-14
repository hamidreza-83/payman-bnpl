@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-primary">پنل سازمانی پذیرندگان پی‌مان</h1>
                <p class="text-gray-500 mt-1">خوش آمدید، مدیریت کسب‌وکار و تراکنش‌های اقساطی شما</p>
            </div>
            <div class="bg-white p-3 rounded-xl border font-bold text-accent">
                کد پذیرنده (Merchant ID): <span class="font-mono text-gray-800">PM-{{ Auth::user()->id + 4500 }}</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <span class="text-gray-400 text-sm font-medium">کل فروش اعتباری (این ماه)</span>
                <div class="text-2xl font-bold text-primary mt-2">۱۴,۶۰۰,۰۰۰ تومان</div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <span class="text-gray-400 text-sm font-medium">تسویه‌حساب‌های واریز شده</span>
                <div class="text-2xl font-bold text-accent mt-2">۵,۷۰۰,۰۰۰ تومان</div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <span class="text-gray-400 text-sm font-medium">تعداد کل تراکنش‌ها</span>
                <div class="text-2xl font-bold text-gray-800 mt-2">۳ تراکنش</div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-800">آخرین تراکنش‌های درگاه BNPL پی‌مان</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-right border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-400 text-sm">
                            <th class="p-4">شناسه تراکنش</th>
                            <th class="p-4">خریدار (مشتری)</th>
                            <th class="p-4">مبلغ کل تراکنش</th>
                            <th class="p-4">وضعیت تسویه</th>
                            <th class="p-4">تاریخ</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm divide-y divide-gray-100">
                        @foreach($transactions as $tx)
                            <tr class="hover:bg-gray-55 transition">
                                <td class="p-4 font-mono text-gray-900">{{ $tx['id'] }}</td>
                                <td class="p-4 font-bold">{{ $tx['user'] }}</td>
                                <td class="p-4 text-primary font-medium">{{ $tx['amount'] }}</td>
                                <td class="p-4">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $tx['status'] == 'موفق' ? 'bg-green-50 text-green-700' : 'bg-yellow-50 text-yellow-700' }}">
                                        {{ $tx['status'] }}
                                    </span>
                                </td>
                                <td class="p-4">{{ $tx['date'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection