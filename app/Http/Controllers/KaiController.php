<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class KaiController extends Controller
{
    public function __construct()
    {
        $this->url = env('TO_KAI');
    }

    public function terminal(Request $request)
    {
        switch ($request->action) {
            case 'station':
                $data = $this->station($request);
                break;
            case 'schedule':
                $data = $this->schedule($request);
                break;
            case 'seatmap':
                $data = $this->seatmap($request);
                break;
            case 'seatmapsub':
                $data = $this->seatmapSub($request);
                break;
            case 'booking':
                $data = $this->booking($request);
                break;
            case 'issue':
                $data = $this->issue($request);
                break;
            case 'status':
                $data = $this->status($request);
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

    public function station($station)
    {
        $parts = [];
        return $this->call($parts,'kaiGetStationList');
    }

    public function schedule($request)
    {
        $this->validate($request,[
            'origin'=>'required',
            'destination'=>'required',
            'date'=>'required|date_format:Y-m-d',
        ]);

        $parts = [
            'org' => $request->origin,
            'des' => $request->destination,
            'date'=> $request->date
        ];

        return $this->call($parts,'kaiSearch');
    }

    public function seatmap($request)
    {
        $this->validate($request,[
            'origin'=>'required',
            'destination'=>'required',
            'date'=>'required|date_format:Y-m-d',
            'trainNo'=>'required',
        ]);

        $parts = [
			'org' => $request->origin,
            'des' => $request->destination,
            'date'=> $request->date,
			'trainNo' => $request->trainNo
		];

		return $this->call($parts,'kaiGetSeatMap');
    }

    public function seatmapSub($request)
    {
        $this->validate($request,[
            'origin'=>'required',
            'destination'=>'required',
            'date'=>'required|date_format:Y-m-d',
            'trainNo'=>'required',
            'subClass'=>'required'
        ]);

        $parts = [
			'org' => $request->origin,
            'des' => $request->destination,
            'date'=> $request->date,
			'trainNo' => $request->trainNo,
			'subClass' => $request->subClass
		];

		return $this->call($parts,'kaiGetSeatMapSubClass');
    }

    public function booking($request)
    {
        // $traveller = [
        //     'adult' => [
        //         [
        //             'adult_name' => 'MUSE',
        //             'adult_id' => '331234897887283674',
        //             'adult_date_of_birth' => '1945-08-17',
        //             'adult_phone' => '081234567890'
        //         ]
        //     ],
        //     'child' => NULL,
        //     'infant' => NULL
        // ];
        
        $this->validate($request,[
            'origin'=>'required',
            'destination'=>'required',
            'date'=>'required|date_format:Y-m-d',
            'trainNo'=>'required',
            'subClass'=>'required',
            'adult' => 'required',
			// 'child' => 'required',
			// 'infant' => 'required',
			'travellers' => 'required',
			'seatSelect' => 'required',
			'wagonCode' => 'required',
			'wagonNumber' => 'required',
			'seats' => 'required'
        ]);

        $parts = [
			'org' => $request->origin,
            'des' => $request->destination,
            'date'=> $request->date,
			'trainNo' => $request->trainNo,
			'subClass' => $request->subClass,
			'adult' => $request->adult,
			'child' => $request->child,
			'infant' => $request->infant,
			'travellerArray' => $request->travellers,
			'seatSelect' => $request->seatSelect,
			'wagonCode' => $request->wagonCode,
			'wagonNumber' => $request->wagonNumber,
			'seats' => $request->seat
		];
        // return $request;
        // return $parts;
		return $this->call($parts,'kaiBook');
    }

    public function issue($request)
    {
        $this->validate($request,[
            'bookingCode'=>'required',
            'totalPrice'=>'required',
        ]);
        
        $parts = [
			'bookingCode' => $request->bookingCode,
			'totalPrice' => $request->totalPrice
		];

		return $this->call($parts,'kaiIssued');
    }

    public function status($request)
    {
        $this->validate($request,[
            'bookingCode'=>'required'
        ]);

        $parts = [
			'bookingCode' => $request->bookingCode
		];

		return $this->call($parts,'kaiCheckBook');
    }

}
