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
        [
            'q' => 'پول از حساب من کسر شد ولی به حساب مقصد واریز نشد.',
            'a' => 'معمولا در اینگونه موارد طی ۷۲ ساعت پول برداشت شده به حساب شما برگشت خواهد خورد. درصورتیکه تا ۷۲ ساعت پول به حساب شما برگشت داده نشد، می بایست با بانک صادرکننده کارت خود موضوع را پیگیری نمایید'
        ],
        [
    'q'=> 'پول از حساب من کسر شد ولی تراکنش ناموفق بود',
    'a'=> 'معمولا در اینگونه موارد طی ۷۲ ساعت پول برداشت شده به حساب شما برگشت خواهد خورد. درصورتیکه تا ۷۲ ساعت پول به حساب شما برگشت داده نشد، می بایست با بانک کارت مقصد موضوع را پیگیری نمایید'
        ],
    ];

    return view('pages.faq', compact('faqs'));
    }

    public function contact() {
        return view('pages.contact');
    }

    public function submitRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:11',
            'amount' => 'required|numeric|min:1000000',
        ], [
            'phone.digits' => 'شماره تماس باید ۱۱ رقم باشد.',
            'amount.min' => 'حداقل مبلغ درخواستی یک میلیون تومان است.'
        ]);

        return redirect()->back()->with('success', 'درخواست شما ثبت شد. در اسرع وقت کارشناسان ما با شما تماس می‌گیرند.');
    }
}
