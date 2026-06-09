@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-primary mb-8 text-center">سوالات متداول (FAQ)</h1>
    
    <div class="max-w-3xl mx-auto space-y-4">
        @foreach($faqs as $faq)
            <div class="bg-white p-6 rounded-xl shadow-sm border-r-4 border-accent">
                <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $faq['q'] }}</h3>
                <p class="text-gray-600">{{ $faq['a'] }}</p>
            </div>
        @endforeach
    </div>
@endsection