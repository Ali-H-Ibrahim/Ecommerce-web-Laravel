<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\User;
use App\Models\Address;
use App\Models\Wanted;
use App\Notifications\UserNotification;
use App\Traits\ecommereTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class CustomerController extends Controller
{
    use ecommereTrait;

    //Checked ((Not Important))//
    public function create()
    {
        return view('front.account.register');
    }

    //sing-up
    public function store(Request $request)
    {

        $user = User::create([
            'first_name' => $request -> first_name,
            'last_name' => $request -> last_name,
            'email' => $request -> email,
            'password' => bcrypt($request->password),
            'user_points' => 1000,
        ]);

        if (auth()->guard()->attempt(['email' => $user->email, 'password' => $request->password])) {
            return redirect()->route('info',$user->id);
        } else {
            return redirect()->route('registerCustomer')->with('login_error', 'Wrong input, please check email or password');
        }
    }

    public function getInfo($id)
    {
        $user = User::find($id);
        return view('front.account.complete-info',compact('user'));
    }

    public function storeInfo(Request $request , $id)
    {
        $address = Address::create([
            'user_id' => $id,
            'address' => $request -> address,
            'city' => $request -> city,
            'country' => $request -> country,
            'mobile' => $request -> mobile
        ]);

        if($address){
            return redirect()->route('main_page');
        }
        else{
            return redirect()->route('get.info')->with('login_error', 'Wrong input, please try again');
        }
    }

    public function getlogin()
    {
        return view('front.account.login');
    }

    public function login(Request $request)
    {
        $data = $request->input();
        if (auth()->guard()->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return redirect()->route('main_page');
        } else {
            return redirect()->route('get_login')->with('login_error', 'Wrong input, please check email or password');
        }


    }

    public function logout()
    {
        Auth::logout();
        $notification = array(
            'messege' => 'Successfully Logout',
            'alert-type' => 'success'
        );
        return Redirect()->route('main_page')->with($notification);
    }

    public function notifyProduct(Request $request)
    {
        Wanted::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id
        ]);

        // تم تفعيل الإشعارات لهذا المنتج
    }

    public function personalPage()
    {
        return view('front.user.personal_page', array('user' => Auth::user()));
    }

    public function userPoints()
    {
        $user = Auth::user();
        return view('front.user.point',compact('user'));
    }

    public function updateProfileInfo(Request $request)
    {

        $user = Auth::user();
        if (!($request->has('password')))
            $user = $user->update($request->except('_token'));
        else {
            $user = $user->update(bcrypt($request->password));
        }

        if ($user)
            return \Response::json(['success' => 'Your profile updated successfully 😊']);
        else
            return \Response::json(['error' => 'Something goes wrong..! 😥']);
    }

    public function updateProfileImage(Request $request)
    {

        if ($request->has('profile_image')) {

            if (Auth::user()->image) {
                $this->deletImage('', Auth::user()->image);

                $userImage ='images\avatar\\' .$this->saveImage($request->profile_image, 'images\avatar');


                User::find( Auth::id())->update([
                    'image' => $userImage
                ]);


            } else {
                $profileImage = $request->file('profile_image');

                $filename = time() . $profileImage->getClientOriginalName();

                Image::make($profileImage)->resize(300, 300)->save(public_path('images\avatar\\' . $filename));

                $user = Auth::user();

                $user->image = 'images\avatar\\' . $filename;

                $user->save();
            }

        }

        return \Response::json(['success' => 'Your image updated successfully 😍']);

    }
    
    public function updateAddress(Request $request)
    {

        $user = Auth::user();
        
        $address = $user -> address -> update($request->except('_token'));

        if ($address)
            return \Response::json(['success' => 'Your profile updated successfully 😊']);
        else
            return \Response::json(['error' => 'Something goes wrong..! 😥']);
    }

}