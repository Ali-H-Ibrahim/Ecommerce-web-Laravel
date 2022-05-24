<?php

namespace App\Http\Controllers;

use App\Services\FatoorahService;
use Illuminate\Http\Request;

class FatoorahController extends Controller
{
    private $fatoorahService;
	public function __construct(FatoorahService $fatoorahService)
	{
	    $this -> fatoorahService = $fatoorahService;
	}

    public function payProcess()
    {

        $data = [
		    'CustomerName'       => 'Ashraf Sy',
		    'NotificationOption' => 'LNk', //'SMS', 'EML', or 'ALL'
		    'InvoiceValue'       => 100,
		    'CustomerEmail'      => 'ashraf.sasha@gmail.com',
		    'CallBackUrl'        => env('fatoorah_success_url'), // 'http://localhost:8000/callback'
		    'ErrorUrl'           => env('fatoorah_error_url'), // 'http://localhost:8000/error'
		    'Language'           => 'en', //or 'ar'
			'DisplayCurrencyIso' => 'SAR',
		];

        return $this -> fatoorahService -> sendPayment($data);
    }


}
