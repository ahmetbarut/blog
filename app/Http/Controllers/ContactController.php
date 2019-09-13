<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Content;
use Illuminate\Http\Request;
class ContactController extends Controller
{
    public function index()
    {
        $content = Content::find(1);
        return view('blog.contact',compact("content"));
    }

    public function show_all()
    {
        $messages = Contact::latest()->paginate(10);
        return view("admin.tables.messages",compact("messages"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|min:5|max:80",
            'subject' => "required|min:5|max:80",
            'email'=> "required|min:10|max:254|email",
            'message' => "required|min:20",
        ]);
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        $request->session()->flash('success', 'Mesajınızız İletildi.');
        return redirect()->route('blog.iletisim');
    }

    public function show(Contact $contact)
    {
        //
    }

    public function edit(Contact $contact)
    {
        //
    }

    public function update(Request $request, Contact $contact)
    {
        //
    }

    public function destroy(Contact $contact)
    {
        //
    }
}
