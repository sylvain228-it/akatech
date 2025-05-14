<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Classe;
use App\Models\ImageCarousel;
use App\Models\Newsletter;
use App\Models\Service;
use App\Notifications\NotifyAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class FrontendController extends Controller
{
    public function index()
    {
        $services = Service::orderByDesc('created_at')->take(3)->get();
        $imagesCarousel = ImageCarousel::orderByDesc('created_at')->get();
        return view('frontend.home', compact('imagesCarousel', 'services'));
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function services()
    {
        $services = Service::orderByDesc('created_at')->get();
        return view('frontend.services', compact('services'));
    }

    public function newsletter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'string', 'max:255'],
        ]);

        try {
            if ($validator->fails()) {
                return response()->json(['message' => 'Validation échouée', 'errors' => $validator->errors()], 422);
            }

            if (!Newsletter::where('email', $request->email)->first()) {

                Newsletter::create($request->all());
                $admin = Admin::findOrFail(1);

                $admin->notify(new NotifyAdmin(
                    "Nouvel abonné",
                    "Un nouvau utilisateur s'est abonné au newsletter",
                ), );
            }

            return response()->json(['message' => 'Merci, email enregistré avec succès !']);

        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }
    }

}