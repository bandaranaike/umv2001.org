<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class LegalPageController extends Controller
{
    public function terms(): Response
    {
        return Inertia::render('Legal/TermsOfUse');
    }

    public function privacy(): Response
    {
        return Inertia::render('Legal/PrivacyPolicy');
    }

    public function cookies(): Response
    {
        return Inertia::render('Legal/CookiePolicy');
    }
}
