<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class VoucherGameController extends Controller
{
    use \App\HDP\Dev; public $url;
    
    public function __construct()
    {
        $this->url = env('TO_VCGAME');
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
            case 'status':
                $data = $this->status($request);
                break;
            
            default:
                return abort(422, 'Need an Action parameter!');
                break;
        }

        if (isset($data['responseCode'])) {
            if ($data['responseCode'] !== '00') {
                return abort(422, $data['message']);
            }
        }

        if (isset($data['status'])) {
            if ($data['status']!=='00') {
                return abort(422, $data['msg'] );
            }
        }

        $this->responseCode = 200;
        $this->results = (isset($data[0]))?$data:[$data];
        $this->request = [
            'get'=>$request->all()
        ];
        return $this->response();
    }
    
    public function inquiry($request)
    {

        $parts = [
            'productID' => $request->productId
        ];

        return $this->call($parts, 'productListGame');
    }

    public function payment($request)
    {
        $this->validate($request,[
            'productId'=>'required',
            'amount'=>'required|numeric',
        ]);

        $parts = [
            'productID' => $request->productId, 
            'amount' => $request->amount, 
            'uniqueID' => uniqid()
        ];
        
        return $this->call($parts, 'paymentVoucherGame');
    }

    public function status($request)
    {
        $this->validate($request,[
            'msisdn'=>'required|numeric',
            'trxId'=>'required|numeric',
        ]);

        $parts = [
            'msisdn' => $request->msisdn, 
            'trxID' => $request->trxId
        ];
        
        return $this->call($parts, 'voucherGameStatus');
    }
}
