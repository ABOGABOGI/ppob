<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    use \App\HDP\Dev; public $url;
    
    public function __construct()
    {
        $this->url = env('TO_TRAVEL');
    }

    public function terminal(Request $request)
    {
        switch ($request->action) {
            case 'agent':
                $data = $this->agent($request);
                break;
            case 'arrival':
                $data = $this->arrival($request);
                break;
            case 'departure':
                $data = $this->departure($request);
                break;
            case 'departure-schedule':
                $data = $this->departureSchedule($request);
                break;
            case 'seatmap':
                $data = $this->seatmap($request);
                break;
            case 'booking':
                $data = $this->booking($request);
                break;
            case 'payment':
                $data = $this->payment($request);
                break;
            case 'check':
                $data = $this->check($request);
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

    public function agent($request)
    {
        return $this->call([],'travelGetAgen');
    }

    public function departure($request)
    {
        $this->validate($request,[
            'agentCode'=>'required'
        ]);

        $parts = [
			'kodeAgen' => $request->agentCode
        ];
		
		return $this->call($parts,'travelGetKeberangkatan');
    }
    
    public function arrival($request)
    {
        $this->validate($request,[
            'agentCode'=>'required',
            'departureId'=>'required',
        ]);

        $parts = array(
            'kodeAgen'			=> $request->agentCode,
            'idKeberangkatan'	=> $request->departureId
        );
        
        return $this->call($parts,'travelGetKedatangan');
    }

    public function departureSchedule($request)
    {
        $this->validate($request,[
            'agentCode'=>'required',
            'departureId'=>'required',
            'arrivalId'=>'required',
            'date'=>'required|date_format:Y-m-d',
            'travellerCount'=>'required'
        ]);

        $parts = array(
            'kodeAgen'			=> $request->agentCode,
            'idKeberangkatan'	=> $request->departureId,
            'idKedatangan'		=> $request->arrivalId,
            'tanggal'			=> $request->date,
            'penumpang'			=> $request->travellerCount
        );
        
        return $this->call($parts,'travelGetJadwalKeberangkatan');
    }

    public function seatmap($request)
    {
        $this->validate($request,[
            'agentCode'=>'required',
            'scheduleCode'=>'required',
            'date'=>'required|date_format:Y-m-d',
            'seatLayout'=>'required',
            'scheduleId'=>'required'
        ]);

        $parts = array(
			'kodeAgen'			=> $request->agentCode,
			'kodeJadwal'		=> $request->scheduleCode,
			'tanggal'			=> $request->date,
			'kodeLayoutKursi'	=> $request->seatLayout,
			'idJadwal'			=> $request->scheduleId
		);
		
		return $this->call($parts,'travelGetMapKursi');
    }

    public function booking($request)
    {
        $this->validate($request,[
            'agentCode'=>'required',
            'scheduleCode'=>'required',
            'date'=>'required|date_format:Y-m-d',
            'customerName'=>'required',
            'customerAddress'=>'required',
            'customerPhone'=>'required',
            'customerEmail'=>'required',
            'customerCount'=>'required',
            'seatNo'=>'required',
            'passengerName'=>'required',
            // 'promoCode'=>'required'
            // 'promoType'=>'required',
            // 'quotaId'=>'required',
            // 'layoutId'=>'required'
        ]);

        $parts = array(
			'kodeAgen'			=> $request->agentCode,
			'kodeJadwal'		=> $request->scheduleCode,
			'tanggal'			=> $request->date,
			'namaPemesan'		=> $request->customerName,
			'alamatPemesan'		=> $request->customerAddress,
			'telpPemesan'		=> $request->customerPhone,
			'emailPemesan'		=> $request->customerEmail,
			'jumlahPenumpang'	=> $request->customerCount,
			'noKursi'			=> $request->seatNo,
			'namaPenumpang'		=> $request->passengerName,
			'kodePromo'			=> $request->promoCode,
			'tipePromo'			=> $request->promoType,
			'kuota_id'			=> $request->quotaId,
			'id_layout'			=> $request->layoutId
		);
		
		return $this->call($parts,'travelBook');
    }

    public function payment($request)
    {
        $this->validate($request,[
            'bookingCode'=>'required',
            'totalPrice'=>'required',
        ]);

        $parts = array(
			'kodeBooking'		=> $request->bookingCode,
			'totalHarga'		=> $request->totalPrice
		);
		
		return $this->call($parts,'travelPayBook');
    }

    public function check($request)
    {
        $this->validate($request,[
            'bookingCode'=>'required',
        ]);

        $parts = array(
			'kodeBooking'		=> $request->bookingCode
		);
		
		return $this->call($parts,'travelCekReservasi');
    }
}