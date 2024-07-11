<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppRedirectController extends Controller {
    public function request(Request $request)
    {
        return redirect(route('/home'));
    }
}
