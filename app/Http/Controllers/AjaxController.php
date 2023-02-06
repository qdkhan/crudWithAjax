<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function saveData(Request $request) {
        return $request->all();
    }
}
