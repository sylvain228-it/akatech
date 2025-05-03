<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Mockery\CountValidator\Exception;

class VerificationController extends Controller
{
    public function notice()
    {
        return view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('dashboard');
    }

    public function resend(Request $request)
    {
        try {
            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->route('dashboard');
            }

            $request->user()->sendEmailVerificationNotification();

            return back()->with('status', 'Le lien de vérification a été renvoyé.');
        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }
    }
}