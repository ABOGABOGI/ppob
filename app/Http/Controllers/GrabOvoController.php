<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class GrabOvoController extends Controller
{
    use \App\HDP\Dev; public $url;
    
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

        // if (isset($data['errCode'])) {
        //     if ($data['errCode']!==0 or $data['errCode']!=="0") {
        //         return abort(422, $data['msg'] );
        //     }
        // }

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
