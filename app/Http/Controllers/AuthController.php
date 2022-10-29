<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use  Illuminate\Auth\RequestGuard;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule as ValidationRule;

class AuthController extends Controller
{

    protected $listen = [
        'Illuminate\Auth\Events\Logout' => [
            App\Listeners\DeleteUserAccessTokens::class,
        ],
    ];

    public function register(Request $request)
    {
        try {
            $user = $request->validate([
                'email' => ['required', 'string', ValidationRule::unique('users', 'email')],
                'password' => ['required', 'min:3', 'max:50']
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $state = User::create([
            'name' => 'zakerxa',
            'email' => $user['email'],
            'password' => bcrypt($user['password'])
        ]);
        if ($state) {
            return response()->json(['response' => 'success']);
        } else return response()->json(['response' => 'Error Something Wrong']);
    }
    public function login(Request $request)
    {

        $admin = $request->validate([
            'email' => ['required', 'email', ValidationRule::exists('users', 'email'), 'max:255'],
            'password' => ['required', 'min:3', 'max:50']
        ]);
        // Auth User
        if (auth()->attempt($admin)) {
            // Check Email
            $user = User::where('email', $admin['email'])->first();
            $token = $user->createToken('auth')->plainTextToken;
            return response()->json([
                'response' => 'success',
                'token' => $token
            ]);
        } else {
            return response(['response' => 'The provided credentials do not match our records.']);
        }
        // Check Password
        //  if(!$user || !Hash::check($admin['password'],$user['password'])){
        //     return response()->json(['response'=>'Incorrect password']);
        //  }
    }

    public function index(Request $request)
    {
       $form = ContactForm::OrderBy('id', 'desc')->filter(request(['search']))->paginate($request->per_page ?? 5);
       $noti = ContactForm::where('read',0)->OrderBy('created_at','desc')->count();
        return response()->json(['data'=>$form,'noti'=>$noti]);
    }


    public function read($id){
        $form = ContactForm::find($id);
        if($form){
            $form->read = 1;
            $form->save();
            return response()->json(['response'=>'success']);
        }
        return response()->json(['response'=>'No Data Found']);
    }

    public function logout(Request $request)
    {
        // Revoke the token that was used to authenticate the current request...
        $request->user()->currentAccessToken()->delete();
        // Revoke the all token
        // $request->user()->tokens()->delete();
        return response()->json(['response' => 'logout']);
    }
}
