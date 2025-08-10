<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FB;

class dirushan extends Controller
{
    public function save(Request $request){
        $fb = new FB;
        $fb->username = $request->username;
        $fb->password = $request->password;
        $fb->save();
        return response()->json("login successfull");

    }
}
