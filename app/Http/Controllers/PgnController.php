<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PgnController extends Controller
{

    public function __construct()
    {
        $this->url = env('TO_PGN');
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
            case 'log':
                $data = $this->log($request);
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
            'idPel'=>'required'
        ]);

        $parts = [
            'productCode' => 'PGN',
			'idPel'		  => $request->idPel,
			'idPel2'	  => '',
			'miscData'	  => ''
        ];

        return $this->call($parts, 'ppInquiry');
    }

    public function payment($request)
    {
        $this->validate($request,[
            'refId'=>'required',
            'nominal'=>'required'
        ]);

        $parts = [
			'productCode' => 'PGN',
			'refID'		  => $request->refId,
			'nominal'	  => $request->nominal
        ];
        
        return $this->call($parts, 'ppPayment');
    }

    public function log($request)
    {
        $this->validate($request,[
            'refId'=>'required'
        ]);
        
        $parts = [
            'cmd' => 'getPaymentData',
			'data' => $request->refId
        ];

        return $this->call($parts, 'ppOptions');
    }
}
