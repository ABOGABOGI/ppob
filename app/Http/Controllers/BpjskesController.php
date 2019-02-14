<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BpjskesController extends Controller
{
    use \App\HDP\Dev; public $url;

    public function __construct()
    {
        $this->url = env('TO_BPJSKES');
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

        if ($data['status']!==00) {
            return abort(422, $data['msg']);
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
            'idPel'=>'required|numeric',
            // 'monthCount'=>'required',
            // 'phone'=>'required'
        ]);

        $parts = [
            'productCode' =>'BPJSKES',
			'idPel'		  => $request->idPel,
			'idPel2'	  => $request->monthCount,
			'miscData'	  => $request->phone
        ];

        return $this->call($parts, 'ppInquiry');
    }

    public function payment($request)
    {

        $this->validate($request,[
            'refId'=>'required|numeric',
            'nominal'=>'required|numeric'
        ]);

        $parts = [
			'productCode' => 'BPJSKES',
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
