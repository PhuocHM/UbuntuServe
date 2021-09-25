<?php

namespace App\View\Composer;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserComposer
{
    public function compose(View $view)
    {
        $user = Auth::user();
        $view->with('user', $user);
    }
}
