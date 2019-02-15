<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PdamController extends Controller
{
    use \App\HDP\Dev; public $url;
    
    public function __construct()
    {
        $this->url = env('TO_PDAM');
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
            case 'log':
                $data = $this->log($request);
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

        $this->responseCode = 200;
        $this->results = (isset($data[0]))?$data:[$data];
        $this->request = [
            'get'=>$request->all()
        ];
        return $this->response();
    }

    public function productCodes()
    {
        return [
            ['code'=>'PDAM400011','name'=>'PDAM KAB Banyumas'],
            ['code'=>'PDAM400021','name'=>'PDAM Kabupaten Kebumen'],
            ['code'=>'PDAM400051','name'=>'PDAM Kabupaten Cilacap'],
            ['code'=>'PDAM400071','name'=>'PDAM Kabupaten Sleman'],
            ['code'=>'PDAM400081','name'=>'PDAM Kabupaten Boyolali'],
            ['code'=>'PDAM400101','name'=>'PDAM Kabupaten Pekalongan'],
            ['code'=>'PDAM400121','name'=>'PDAM Kabupaten Karanganyar'],
            ['code'=>'PDAM400141','name'=>'PDAM Kabupaten Wonogiri'],
            ['code'=>'PDAM400161','name'=>'PDAM Kabupaten Situbondo'],
            ['code'=>'PDAM400191','name'=>'PDAM Kabupaten Bondowoso'],
            ['code'=>'PDAM400201','name'=>'PDAM Kabupaten Semarang'],
            ['code'=>'PDAM400211','name'=>'PDAM Purworejo'],
            ['code'=>'PDAM400221','name'=>'PDAM Kabupaten Bandung'],
            ['code'=>'PDAM400231','name'=>'PDAM Kota Banjarmasin'],
            ['code'=>'PDAM400251','name'=>'PDAM Kota Surakarta'],
            ['code'=>'PDAM400261','name'=>'PDAM Kota Madiun'],
            ['code'=>'PDAM400271','name'=>'PDAM Kab Purbalingga'],
            ['code'=>'PDAM400281','name'=>'PDAM Kabupaten Malang'],
            ['code'=>'PDAM400301','name'=>'PDAM Kabupaten Rembang'],
            ['code'=>'PDAM400311','name'=>'PDAM Kabupaten Lombok Tengah'],
            ['code'=>'PDAM400321','name'=>'PDAM Kota Salatiga'],
            ['code'=>'PDAM400331','name'=>'PDAM Kabupaten Wonosobo'],
            ['code'=>'PDAM400341','name'=>'PDAM Kabupaten Brebes'],
            ['code'=>'PDAM400351','name'=>'PDAM Kabupaten Jember'],
            ['code'=>'PDAM400371','name'=>'PDAM Kabupaten Buleleng'],
            ['code'=>'PDAM400381','name'=>'PDAM Mataram'],
            ['code'=>'PDAM400401','name'=>'PDAM Intan Banjar'],
            ['code'=>'PDAM400411','name'=>'PDAM Kabupaten Temanggung'],
            ['code'=>'PDAM400511','name'=>'PDAM Kabupaten Sukoharjo'],
            ['code'=>'PDAM400111','name'=>'PDAM Kota Banjar'],
            ['code'=>'PDAM400171','name'=>'PDAM Kab Probolinggo'],
            ['code'=>'PDAM400241','name'=>'PDAM Kab Kendal'],
            ['code'=>'PDAM400421','name'=>'PDAM Kab Blora'],
            ['code'=>'PDAM400541','name'=>'PDAM Kota Denpasar'],
            ['code'=>'PDAM400591','name'=>'PDAM Kab Pati'],
            ['code'=>'PDAM400091','name'=>'PDAM kab Jepara'],
            ['code'=>'PDAM400521','name'=>'PDAM Kab Grobogan'],
            ['code'=>'PDAM400601','name'=>'PDAM Kab Klungkung'],
            ['code'=>'PDAM400501','name'=>'PDAM LAMPUNG'],
            ['code'=>'PDAM400701','name'=>'PDAM Kota Bogor'],
            ['code'=>'PDAM400711','name'=>'PDAM Kab. Bogor'],
            ['code'=>'PDAM400691','name'=>'PDAM Kota Depok'],
            ['code'=>'PDAM400551','name'=>'PDAM Kab. Badung'],
            ['code'=>'PDAM400471','name'=>'PDAM Kota Malang'],
            ['code'=>'PDAM400571','name'=>'PDAM Kab. Samarinda'],
            ['code'=>'PDAM400361','name'=>'PDAM Kab. Barabai'],
            ['code'=>'PDAM400731','name'=>'PDAM Kab. Lumajang'],
            ['code'=>'PDAM400741','name'=>'PDAM Kab. Bojonegoro'],
            ['code'=>'PDAM400751','name'=>'PDAM Kab. Kulonprogo'],
            ['code'=>'PDAM400761','name'=>'PDAM Kota Pontianak'],
            ['code'=>'PDAM400771','name'=>'PDAM Pangkalan Bun'],
            ['code'=>'PDAM400791','name'=>'PDAM Kab. Polewali Mandar'],
            ['code'=>'PDAM400801','name'=>'PDAM Kota Jayapura'],
            ['code'=>'PDAM400811','name'=>'PDAM Balangan'],
            ['code'=>'PDAM400821','name'=>'PDAM Pasaman'],
            ['code'=>'PDAM400851','name'=>'PDAM Mamuju'],
            ['code'=>'PDAM400581','name'=>'PDAM ATB Batam'],
            ['code'=>'PDAM400871','name'=>'PDAM Tegal'],
            ['code'=>'PDAM400641','name'=>'PDAM Palembang'],
            ['code'=>'PDAM400441','name'=>'PDAM Palyja Jakarta'],
            ['code'=>'PDAM400451','name'=>'PDAM Aerta Jakarta'],
            ['code'=>'PDAM400631','name'=>'PDAM Kabupaten Sumedang'],
            ['code'=>'PDAM400611','name'=>'PDAM Kabupaten Banyuwangi'],
            ['code'=>'PDAM400621','name'=>'PDAM Kabupaten Ciamis'],
            ['code'=>'PDAM400651','name'=>'PDAM Kabupaten Jombang'],
            ['code'=>'PDAM400681','name'=>'PDAM Kabupaten Ponorogo'],
            ['code'=>'PDAM400661','name'=>'PDAM Kabupaten Garut'],
            ['code'=>'PDAM400721','name'=>'PDAM Klaten'],
            ['code'=>'PDAM1002','name'=>'PDAM II Tirtanadi MEDAN'],
            ['code'=>'PDAM1000','name'=>'PDAM II TKR Kab Tangerang'],
            ['code'=>'PDAM1001','name'=>'PDAM II TB Kota Tangerang'],
            ['code'=>'PDAM1156','name'=>'PDAM II Batang'],
            ['code'=>'PDAM1135','name'=>'PDAM II Tirta Intan Kab Garut'],
            ['code'=>'PDAM1161','name'=>'PDAM II Kab Tegal'],
            ['code'=>'PDAM1189','name'=>'PDAM II Kab Kulonprogo'],
            ['code'=>'PDAM1142','name'=>'PDAM II Kota Bekasi'],
        ];
    }
    
    public function inquiry($request)
    {
        $this->validate($request,[
            'productCode'=>'required',
            'idPel'=>'required|numeric'
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
            'refId'=>'required|numeric',
            'nominal'=>'required|numeric'
        ]);

        $parts = [
			'productCode' => $request->productCode,
			'refID'		  => $request->refId,
			'nominal'	  => $request->nominal
        ];
        
        return $this->call($parts, 'ppPayment');
    }

    public function log($request)
    {
        $this->validate($request,[
            'refId'=>'required|numeric'
        ]);

        $parts = [
            'cmd' => 'getPaymentData',
			'data' => $request->refId
        ];

        return $this->call($parts, 'ppOptions');
    }
}
