<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactFormController extends Controller
{

    public function index(){
       return ContactForm::OrderBy('created_at','desc');
    }

    public function store(Request $request)
    {


        // return $request->all();
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

        ContactForm::create($inputProduct);

        return response()->json(['response' => 'success']);

    }
}
