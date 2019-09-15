<?php

namespace daxter1987\Controllers;

use App\Http\Controllers\Controller;
use daxter1987\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller {

    public function index()
    {
        return view('contactform::contact');
    }

    public function sendMail(Request $request)
    {
        ContactForm::create($request->all());

        return redirect(route('contact'))->with(['message' => 'Thank you, your mail has been sent successfully.']);
    }
}
