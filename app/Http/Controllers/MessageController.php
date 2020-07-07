<?php

namespace App\Http\Controllers;



class MessageController extends Controller
{
    //
    public function store()
    {
        request()->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'subject' => 'required',
            'content' => ['required', 'min: 3'],
        ]);

        return 'Everything is ok';
    }
}
