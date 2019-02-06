<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BpjskesController extends Controller
{
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

        $this->responseCode = 200;
        $this->results = $data;
        return $this->response();
    }
    
    public function inquiry($request)
    {
        $this->validate($request,[
            'idPel'=>'required',
            'monthCount'=>'required',
            'phone'=>'required'
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
            'refId'=>'required',
            'nominal'=>'required'
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
