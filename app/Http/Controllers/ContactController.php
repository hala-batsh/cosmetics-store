<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function send(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:150',
        'subject' => 'required|string|max:200',
        'message' => 'required|string|max:2000',
    ]);

    return response()->json([
        'success' => true,
        'message' => 'تم إرسال رسالتكِ بنجاح!'
    ]);
}
}
