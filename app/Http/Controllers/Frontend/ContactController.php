<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Admin;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class ContactController extends Controller
{
    public function contact()
    {
        return view('frontend.contact');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'sujet' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            if ($validator->fails()) {
                return response()->json(['message' => 'Validation échouée', 'errors' => $validator->errors()], 422);
            }

            Contact::create($request->all());
            $admin = Admin::findOrFail(1);
            Mail::to($admin->email)->send(new ContactMail($request->all()));

            return response()->json(['message' => 'Message envoyé avec succès !']);

        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }
    }
}