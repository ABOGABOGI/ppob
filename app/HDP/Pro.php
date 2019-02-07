<?php

namespace App\HDP;

use Illuminate\Http\Request;

trait Pro
{
    public function call($parts,$type)
    {
        $soap = new \nusoap_client(
            env('BOSBILLER_HOST_PRO').$this->url, 
            $wsdl = true, 
            $proxyhost = false, 
            $proxyport = false, 
            $proxyusername = false, 
            $proxypassword = false, 
            $timeout = env('SOAP_TIMEOUT'), 
            $response_timeout = env('SOAP_RESPONSE_TIMEOUT'), 
            $portName = ''
        );
        
        $soap->setCredentials(env('BOBBILLER_API_PRO'), env('BOSBILLER_SECRET_PRO'), 'basic');
        
        return $soap->call($type, $parts);
    }
}
