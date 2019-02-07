<?php

namespace App\HDP;

use Illuminate\Http\Request;

trait Dev
{
    public function call($parts,$type)
    {
        $soap = new \nusoap_client(
            env('BOSBILLER_HOST').$this->url, 
            $wsdl = true, 
            $proxyhost = false, 
            $proxyport = false, 
            $proxyusername = false, 
            $proxypassword = false, 
            $timeout = env('SOAP_TIMEOUT'), 
            $response_timeout = env('SOAP_RESPONSE_TIMEOUT'), 
            $portName = ''
        );
        
        $soap->setCredentials(env('BOBBILLER_API'), env('BOSBILLER_SECRET'), 'basic');
        
        return $soap->call($type, $parts);
    }
}
