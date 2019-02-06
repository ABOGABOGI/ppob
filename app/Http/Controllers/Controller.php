<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use \App\HDP\Soap; public $url;

    private $responseCodes = [
        200 => 'Ok',
        204 => 'No Content',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        422 => 'Unprocessable Entity',
        500 => 'Internal Server Error',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout. Web server menunggu respon terlalu lama'
    ];

    public $results         =[];
    public $responseCode    =504;
    public $messages;
    public $metaData        =[];
    public $request         =[];

    protected function getResDescription()
    {
        return $this->responseCodes[$this->responseCode];
    }

    public function __construct(Request $request)
    {
        // $this->request = [
        //     'queries' => [],
        //     'post' => $request->post(),
        //     'get' => $request->query()
        // ];
    }

    protected function data()
    {
        $data = [
            'code'          => $this->responseCode,
            'description'   => $this->getResDescription($this->responseCode),
            'response'      => [],
        ];

        $data['response']['results']=$this->results;
        
        (!empty($this->messages))   ?$data['response']['messages']  =$this->messages:'';
        (!empty($this->metaData))   ?$data['response']['metaData']  =$this->metaData:'';
        (!empty($this->request))    ?$data['request']               =$this->request:'';
        
        $data['debug']=env('APP_DEBUG');

        return $data;
    }

    public function response()
    {
        return response()
            ->json(
                $this->data(),
                $this->responseCode
            );
    }

    protected function buildFailedValidationResponse(Request $request, array $errors) 
    {
        $this->responseCode = 422;
        $this->resulst = [];
        $this->messages = $errors;
        return $this->response();
    }

}
