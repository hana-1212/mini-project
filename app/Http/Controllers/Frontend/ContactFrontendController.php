<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Validator;

class ContactFrontendController extends Controller
{
    public function getIndex()
    {
        return view('Frontend.pages.contact');
    }

    public function postAddSave(Request $request) {
        // $this->validate($request, [
        //     'nama' => 'required',
        //     'email' => 'required',
        //     'pesan' => 'required'
        // ]);


        $validator = Validator::make($request->all(),
        [
            'nama'  => 'required',
            'email' => 'required|email',
            'pesan' => 'required'
        ],[
            "nama.required"         => 'Nama wajib ya',
            "email.required"        => "Email wajib",
            "email.email"           => "Harus berupa email",
            "pesan.required"        => "Pesan Wajib"
        ]);

        validate($validator);

        $save['nama'] = $request->get('nama');
        $save['email'] = $request->get('email');
        $save['pesan'] = $request->get('pesan');
        $save['created_at'] = date('Y-m-d H:i:s');
        DB::table('pesan_contact')->insert($save);

        return redirect('contact')->with(["message"=>"Success Simpan"]);
    }
}
