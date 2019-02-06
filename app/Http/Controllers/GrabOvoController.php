<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class GrabOvoController extends Controller
{

    public function __construct()
    {
        $this->url = env('TO_GRAB_OVO');
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
        return $this->response();
    }
    
    public function inquiry($request)
    {

        $parts = [
            'cmd' => 'ppTopupProductList',
			'data' => 'GRAB'
        ];

        return $this->call($parts, 'ppOptions');
    }

    public function payment($request)
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
        
        return $this->call($parts, 'ppTopup');
    }
}
