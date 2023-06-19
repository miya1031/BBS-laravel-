<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Http\Requests\RegisterRequest;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Log;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        
        if(User::where('email', $validated['email'])->exists()){
            return redirect()->back()->with('message', '既に登録されているメールアドレスです');
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        //iconを登録した場合
        if ($request->file('icon') !== null){
            $icon = new UserDetail();
            $icon->icon = basename($request->file('icon')->store('icons', 'public'));
            //Userテーブルからidを検索
            $user_id = User::where('email', $validated['email'])->first();
            $icon->user_id = $user_id->id;
            $icon->save();
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
