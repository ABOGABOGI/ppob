<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PulsaController extends Controller
{
    use \App\HDP\Dev; public $url;
    
    public function __construct()
    {
        $this->url = env('TO_PULSA');
    }

    public function terminal(Request $request)
    {
        switch ($request->action) {
            case 'inquiry':
                $data = $this->inquiry($request);
                break;
            case 'payment':
                $data = $this->payment($request);
                break;
            
            default:
                return abort(422, 'Need an Action parameter!');
                break;
        }

        $this->responseCode = 200;
        $this->results = $data;
        $this->request = [
            'get'=>$request->all()
        ];
        return $this->response();
    }
    
    public function inquiry($request)
    {
        $this->validate($request,[
            'phone' => 'required|numeric'
        ]);

        $parts = [
            'msisdn' => $request->phone
        ];

        return $this->call($parts, 'inquiry');
    }

    public function payment($request)
    {
        $this->validate($request,[
            'product_id' => 'required',
            'phone' => 'required|numeric',
            'price' => 'required|numeric'
        ]);

        $parts = [
			'product_id' => $request->product_id,
			'msisdn' => $request->phone,
			'purchase_amount' => $request->price
        ];
        return $this->call($parts, 'payment');
    }
}
