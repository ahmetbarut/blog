<?php

namespace App\Http\Controllers;

use App\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        //
    }

    public function create($reply,$mail)
    {
        return view("admin.forms.mail_send",["reply"=>$reply,"mail"=>$mail]);
    }

    public function store(Request $request)
    {
        // 
    }

    public function show(Mail $mail)
    {
        //
    }

    public function edit(Mail $mail)
    {
        //
    }

    public function update(Request $request, Mail $mail)
    {
        //
    }

    public function destroy(Mail $mail)
    {
        //
    }
}
