<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\CartItem;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $link = url()->previous();
        session(['link' => $link]);
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        $user_id = Auth::user()->id;
        $cartId = Cart::where('user_id', "$user_id")
            ->where('status', 'Pending')
            ->pluck('id');
        if ($cartId->isEmpty()) {
            $count = 0;
        }
        else{
            $cartId = $cartId[0];
            $count = CartItem::where('cart_id', "$cartId")
            ->count();
        }
        Session::put('countItem', $count);
        return redirect(session('link'));
    }
}
