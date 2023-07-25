<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showVerificationForm()
    {
        return view('auth.Bvn_verify');
    }

    public function showLoginForm()
    {
        return view('Auth/Login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            // Redirect back to the registration page with the error messages
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

        }

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return view('welcome');
        //return redirect()->route('dashboard');
    }

    public function showRegistrationForm()
    {
        return view('Auth/Register');
    }

    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            // Redirect back to the registration page with the error messages
            return redirect()->route('register')->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log in the user
        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function verify(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'bvn' => 'required|string|size:11',
        ]);


        $bvn = $request->input('bvn');

        // Check if BVN is 11 characters long
        if ($validator->fails()) {
            return redirect()->route('dashboard')->withErrors($validator)->withInput();
        }

        // Get the API key from the .env file.
        $apiKey = env('YOUVERIFY_API_KEY');
        $apiUrl = "https://api.sandbox.youverify.co/v2/api/identity/ng/bvn";
        $postData = [
            'id' => $bvn,
            'isSubjectConsent' => true,
        ];

        $response = Http::withHeaders([
            'token' => $apiKey,
        ])->post($apiUrl, $postData);

        // The response data.
        $responseData = $response->json();

        return response()->json($responseData);

    }

}
