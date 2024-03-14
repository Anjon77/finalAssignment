<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function CustomLoginPage()
    {
        return view("custom_auth.login-page");
    }

    public function CustomRegisterPage()
    {
        return view("custom_auth.register-page");
    }

    public function CustomCandidateLoginPage()
    {
        return view("custom_auth.candidate-login");
    }

    public function CustomCompanyLoginPage()
    {
        return view("custom_auth.company-login");
    }

    public function CustomCandidateRegisterPage()
    {
        return view("custom_auth.candidate-register");
    }

    public function CustomCompanyRegisterPage()
    {
        return view("custom_auth.company-register");
    }
}
