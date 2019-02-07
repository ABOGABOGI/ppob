<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PlnController extends Controller
{

    public function __construct()
    {
        $this->url = env('TO_PLN');
    }

    public function terminal(Request $request)
    {
        switch ($request->action) {
            case 'product-codes':
                $data = $this->productCodes();
                break;
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
        return $this->response();
    }

    public function productCodes()
    {
        return [
            ['code'=>'PLNNONTAGLISB','name'=>'PLN NON Tagihan Listrik'],
            ['code'=>'PLNPOSTPAIDB','name'=>'PLN Postpaid'],
            ['code'=>'PLNPREPAIDB','name'=>'PLN Prepaid'],
        ];
    }
    
    public function inquiry($request)
    {

        $this->validate($request,[
            'productCode'=>'required',
            'idPel'=>'required'
        ]);

        $parts = [
            'productCode' => $request->productCode,
			'idPel'		  => $request->idPel,
			'idPel2'	  => '',
			'miscData'	  => ''
        ];

        return $this->call($parts, 'ppInquiry');
    }

    public function payment($request)
    {
        $this->validate($request,[
            'productCode'=>'required',
            'refId'=>'required',
            'nominal'=>'required'
        ]);

        $parts = [
			'productCode' => $request->productCode,
			'refID'		  => $request->refId,
			'nominal'	  => $request->nominal
        ];
        
        return $this->call($parts, 'ppPayment');
    }
}
