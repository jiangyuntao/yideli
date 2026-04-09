<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

class LegalController extends BaseController
{
    public function privacyPolicy(Request $request)
    {
        return view('index.legal.privacy-policy', $this->data);
    }

    public function termsOfUse(Request $request)
    {
        return view('index.legal.terms-of-use', $this->data);
    }
}

