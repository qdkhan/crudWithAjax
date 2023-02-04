<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function saveData(Request $request) {
        return $request->all();
    }
}
