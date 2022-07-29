<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function getIndex(Request $request) {
        $search = $request->get('search');
        $data['title'] = 'List Contact';
        $data['contact'] = DB::table('pesan_contact')->paginate(2);

        return view('backend.page.contact.index',$data);
    }


}
