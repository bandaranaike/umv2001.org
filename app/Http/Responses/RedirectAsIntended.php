<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class RedirectAsIntended implements Responsable
{
    public function __construct(public string $name)
    {
        //
    }

    public function toResponse($request)
    {
        return redirect()->intended(app(LoginResponse::class)->dashboardPath($request));
    }
}
