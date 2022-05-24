<?php

namespace App\Http\Controllers\Front;

use App\Models\Brand;
use App\Models\Complaint;
use App\Models\Images;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{

    public function index()
    {
        $images = Images::where('product_id', 0)->get(['img']);

        return view('front.main_page', compact('images'));
    }

    public function showAboutUs()
    {
        return view('front.relatedPages.about_us');
    }

    public function faq()
    {
        return view('front.relatedPages.FAQ');
    }

    public function clientServices()
    {
        return view('front.relatedPages.client_services');
    }

    public function privacyPolicy()
    {
        return view('front.relatedPages.privacy-policy');
    }

    public function privacyPolicies()
    {
        return view('front.relatedPages.privacy-policy');
    }

    public function shippingPolicies()
    {
        return view('front.relatedPages.shipping-policy');
    }

    public function returnPolicies()
    {
        return view('front.relatedPages.return-policy');
    }

    public function paymentPolicies()
    {
        return view('front.relatedPages.payment-policy');
    }
    public function settings()
    {
        $user = User::with('address')->where('id', Auth::id())->first();
        return view('front.settings.settings', compact('user'));
    }

    public function settingsNotification()
    {
        return view('front.settings.settingNotification');
    }

    public function getQuestionnaire()
    {
        $categories = Category::get();
        return view('front.relatedPages.questionnaire', compact('categories'));
    }

    public function storeQuestionnaire(Request $request)
    {

        $business = collect($request->business)->implode(',');
        $type = collect($request->type)->implode(',');
        DB::table('questionnaires')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'brand' => $request->brand,
            'business' => $business,
            'type' => $type
        ]);

        $images = Images::where('product_id', 0)->get(['img']);
        return redirect()->route('main_page', compact('images'))->with('success', 'Submission Sent Successfully');
    }

    public function getComplaint()
    {
        return view('front.relatedPages.complaints');
    }

    public function storeComplaint(Request $request)
    {
        Complaint::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        $images = Images::where('product_id', 0)->get(['img']);
        return redirect()->route('main_page', compact('images'))->with('success', 'Submission Sent Successfully');
    }

    public function follow()
    {
        return view('front.user.follow');
    }

}
