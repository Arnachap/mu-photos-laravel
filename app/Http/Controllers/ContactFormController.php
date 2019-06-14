<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create() {
        return view('contact.create');
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        // Send Email
        Mail::to('contact@mu-photos.com')->send(new ContactFormMail($data));

        return redirect('contact');
    }
}
