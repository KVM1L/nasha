<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contactsSettings = Setting::pluck('value', 'key')->toArray();

        return view('website.contact', compact('contactsSettings'));
    }

    public function post(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $formData = [
            'name'    => $request->input('name'),
            'email'   => $request->input('email'),
            'message' => $request->input('message'),
        ];

        $emailTo = Setting::firstWhere('key', 'email')?->value;

        if ($emailTo) {
            Mail::to($emailTo)->send(new ContactFormMail($formData));
        }

        return redirect()->back()->with('success', 'Thank you!');
    }
}
