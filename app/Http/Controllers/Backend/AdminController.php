<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getIndex(){
        return view('Backend.pages.dashboard.index');
    }
}
