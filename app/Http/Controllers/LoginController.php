<?php

namespace App\Http\Controllers;

use App\Client\SymfonySkeletonApi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;

class LoginController extends Controller
{
    protected SymfonySkeletonApi $skeletonApi;

    public function __construct(SymfonySkeletonApi $skeletonApi)
    {
        $this->skeletonApi = $skeletonApi;
    }

    public function get(Request $request)
    {
       return view('login');
    }

    public function post(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        $data = $request->only('email', 'password');

        $response = $this->skeletonApi->login($data['email'], $data['password']);

        session($response);
        return redirect()->route('author-lists');
    }
}
