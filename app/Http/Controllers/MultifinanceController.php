<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MultifinanceController extends Controller
{
    use \App\HDP\Dev; public $url;
    
    public function __construct()
    {
        $this->url = env('TO_MULTIFINANCE');
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
        $this->request = [
            'get'=>$request->all()
        ];
        return $this->response();
    }

    public function productCodes()
    {
        return [
            ['code'=>'FNFIF', 'name'=>'FIF Finance'],
            ['code'=>'FNWOMD','name'=>'Wahana Ottomitra Multiartha Finance'],
            ['code'=>'MEGAFIND','name'=>'Mega Finance'],
            ['code'=>'FNCOLUMD','name'=>'Columbia Finance'],
            ['code'=>'FNBAFD','name'=>'Bussan Auto Finance'] 
        ];
    }
    
    public function inquiry($request)
    {
        $this->validate($request,[
            'productCode'=>'required',
            'idPel'=>'required|numeric',
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
            'nominal'=>'required|numeric',
        ]);

        $parts = [
			'productCode' => $request->productCode,
			'refID'		  => $request->refId,
			'nominal'	  => $request->nominal
        ];
        
        return $this->call($parts, 'ppPayment');
    }
}
