<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DB;
use Carbon\Carbon;
use Mail;

class AdminController extends Controller
{
    //Checked ((Not Important))//
    public function create()
    {

        return view('admin.account.admin_register');
    }

    //Checked ((Not Important))//
    public function store(Request $request)
    {
        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('adminLogin')->with('register_success', 'Registration completed successfully');
    }

    //Checked//
    public function getLogin()
    {
        return view('admin.account.admin_login');
    }

    //Checked//
    public function postLogin(Request $request)
    {

        $data = $request->input();
        if (auth()->guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'admin' => 1])) {
            return redirect()->route('adminDashboard');
        } else {
            return redirect()->route('adminLogin')->with('login_error', 'Wrong input, please check email or password');
        }

    }

    //Checked//
    public function dashboard()
    {
        $product=Product::get();
        $pendingOrders = Order::where('status', 'pending')->with('users')->with('orderProducts')->get();
        $orders = Order::with('users')->with('orderProducts')->paginate(5);
        $num = Order::where('status', 'completed')->get();

        return view('admin.dashboard', compact('orders', 'num'),compact('pendingOrders','product'));
    }

    //Checked//
    public function logout()
    {
        //Session::flush();
        auth()->guard('admin')->logout();
        return redirect()->route('adminLogin');
    }

    //Checked//
    public function settings()
    {
        return view('admin.account.settings');
    }

    public function showAllOrders()
    {
        return view('admin.orders.index');
    }

    public function showOrder($id)
    {
        $orders = Order::find($id);
        return view('admin.orders.show', compact('orders'));
    }

    //Checked//
    public function updatePassword(Request $request)
    {

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'min:8'],
            'confirm_password' => ['same:new_password', 'min:8'],
        ]);
        User::find(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect()->route('adminSettings')->with('passowrd_success', 'Password updated successfully');
    }


    //NOT CHECKED !!!//
    public function getMail()
    {
        return view('admin.account.password.email');
    }

    //NOT CHECKED !!!//
    public function sendMail(Request $request)
    {

        $user = User::where('email', $request->email)->first();
        if (!$user)
            return redirect()->route('getForgotPassword')->with('email_error', 'Invalid email, try again');

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('admin.account.password.verify', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        return redirect()->route('getForgotPassword')->with('message', 'A reset password link has been sent to your email');
    }

    //NOT CHECKED !!!//
    public function createPassword($token)
    {
        $tokenData = DB::table('password_resets')->where('token', $token)->first();
        if (!$tokenData)
            return route('getForgotPassword')->with('token_error', 'an error occured, please try again');

        return view('admin.account.password.reset', ['token' => $token]);
    }

    //NOT CHECKED !!!//
    public function storePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$updatePassword) {
            return redirect()->route('getForgotPassword')->with('token_error', 'an error occured, please try again');
        }

        $user = User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_resets')->where([
            'email' => $request->email
        ])->delete();

        return redirect()->route('adminLogin')->with('message', 'Your password has been changed!');

    }


    public function saveAdmin()
    {

        $user = new App\Models\User();
        $user->name = "Ali";
        $user->email = "a@hotmail.com";
        $user->password = bcrypt("ali123456");
        $user->Admin = 1;
        $user->save();


    }
}
