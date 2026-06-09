<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller {
    public function home() {
        return view("pages.home");
    }

    public function about() {
        return view("pages.about");
    }

    public function faq() {
    $faqs = [
        [
            'q' => 'در صورتی که پاسخ سوال خود را پیدا نکردم، چه کنم؟',
            'a' => 'می‌توانید از طریق فرم تماس یا شماره تلفن‌های پشتیبانی با ما تماس بگیرید.'
        ],
        [
            'q' => 'چگونه کارت به کارت انجام دهم؟',
            'a' => 'مشخصات کارت مبدا و مقصد را وارد کنید و انتقال وجه انجام دهید...'
        ],
        [
            'q' => 'سقف تراکنش کارت به کارت چقدر است؟',
            'a' => 'سقف هر تراکنش کارت به کارت یک میلیون تومان است.'
        ],
    ];

    return view('pages.faq', compact('faqs'));
    }

}
