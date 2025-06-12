<?php

namespace App\Http\Controllers;

class FrontPagesController extends Controller
{
    public function aboutUs(){
        return view('front.about_us');
    }

    public function feedback(){
        return view('front.feedback');
    }

    public function privacyPolicy(){
        return view('front.privacy_policy');
    }

    public function mobileAppInstructions(){
        return view('front.moblie_app_instructions');
    }
}
