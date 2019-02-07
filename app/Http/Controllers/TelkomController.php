<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class TelkomController extends Controller
{
    use \App\HDP\Dev; public $url;
    
    public function __construct()
    {
        $this->url = env('TO_TELKOM');
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
            'idPel'=>'required'
        ]);

        $parts = [
            'productCode' => 'TELKOMPSTN',
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
			'productCode' => 'TELKOMPSTN',
			'refID'		  => $request->refId,
			'nominal'	  => $request->nominal
        ];
        
        return $this->call($parts, 'ppPayment');
    }
}
