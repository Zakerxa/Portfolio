<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormsMail;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class ContactFormController extends Controller
{

    public function index(Request $request){
        $forms = ContactForm::select('id','name','email','subject','created_at')->OrderBy('id','desc')->paginate($request->per_page??5);
        return response()->json($forms);
    }

    public function deleteform(Request $request){
        try {
            $formData = $request->validate([
                'password' => ['required','min:6','max:80'],
                'id' => 'required'
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $form = ContactForm::find($formData['id']);
        if ($form){
            if(Hash::check($formData['password'], $form->password)){
                $form->delete();
                return response()->json(['response' => 'success']);
            }else return response()->json(['response' => 'incorrect']);
        }else return response()->json(['response' => 'error']);
    }

    public function store(Request $request)
    {
        try {
            $inputProduct = $request->validate([
                'subject' => ['required'],
                'name' => ['required', 'min:4','max:50'],
                'phone' => ['required','numeric','min:10'],
                'email' => ['required','email'],
                'message' => ['required','min:10'],
                'password' => ['required','min:6']
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }

        //  Random Token
        $string     = 'QWERTYUIOPASDFGHJKLZXCVBNM0123456789';
        $shuffle    = str_shuffle($string);
        $slug       = substr($shuffle, 0, 12) . '-' . rand(10000, 99999);

        $inputProduct['token'] = $slug;

        $client = ContactForm::create($inputProduct);
        if($client){
            Mail::to($client->authMail)->send(new ContactFormsMail($client));
        }

        return response()->json(['response' => 'success']);

    }
}
