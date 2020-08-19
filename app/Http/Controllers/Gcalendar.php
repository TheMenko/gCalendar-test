<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Gcalendar extends Controller
{
    public function process_request(Request $request) {
        $validator = Validator::make($request->all() ,[
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
            'time' => ['required'],
            'date' => ['required']
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }


        return true;
    }
}
