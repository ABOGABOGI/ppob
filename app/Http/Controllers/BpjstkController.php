<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BpjstkController extends Controller
{
    use \App\HDP\Pro; public $url;

    public function __construct()
    {
        $this->url = env('TO_BPJSTK');
    }

    public function terminal(Request $request)
    {
        switch ($request->action) {
            case 'verify-ktp':
                $data = $this->verifyKtp($request);
                break;
            case 'job-location':
                $data = $this->jobLocation();
                break;
            case 'provinces':
                $data = $this->provinces();
                break;
            case 'districts':
                $data = $this->districts($request);
                break;
            case 'branch-offices':
                $data = $this->branchOffices($request);
                break;
            case 'registration':
                $data = $this->registration($request);
                break;
            case 'pay-dues':
                $data = $this->payDues($request);
                break;
            case 'inquiry-dues-by-nik':
                $data = $this->inquiryDuesByNIK($request);
                break;
            case 'calculate-dues':
                $data = $this->calculateDues($request);
                break;
            case 'inquiry-dues-code':
                $data = $this->inquiryDuesCode($request);
                break;
            case 'inquiry-reprint':
                $data = $this->inquiryReprint($request);
                break;
            case 'participantData':
                $data = $this->participantData($request);
                break;
            case 'program-select':
                $data = $this->programSelect($request);
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

    public function verifyKtp($request)
    {
        
        $this->validate($request,[
            'nik'=>'required|numeric',
            'ktpName'=>'required',
            'birthDate'=>'required|date_format:Y-m-d',
            'phone'=>'required|numeric'
        ]);

        $parts = array(
            'nik' => $request->nik,
            'namaKtp' => $request->ktpName,
            'tgLahir' => $this->formatDate($request->birthDate),
            'noPonsel' => $request->phone,
        
        );
        
        return $this->call(['data' => $parts],'verifyKTPeL');
    }

    public function jobLocation()
    {
        return $this->call([],'getLokasiKerja');
    }

    public function provinces()
    {
        return $this->call([],'getProvinsiList');
    }

    public function districts($request)
    {
        $this->validate($request,[
            'provinceCode'=>'required|numeric',
        ]);

        return $this->call([
            'kodeProvinsi' => $request->provinceCode
        ],'getKabupaten');
    }

    public function branchOffices($request)
    {
        $this->validate($request,[
            'districtCode'=>'required|numeric',
        ]);

        return $this->call([
            'kodeKabupaten' => $request->districtCode
        ],'getKantorCabang');
    }

    protected function formatDate($date)
    {
        $originalDate = $date;
        return $newDate = date("d-m-Y", strtotime($originalDate));
    }

    public function registration($request)
    {
        $this->validate($request,[
            'nik'=>'required|numeric',
            'ktpName'=>'required',
            'expNik'=>'required|date_format:Y-m-d',
            'birthPlace'=>'required',
            'birthDate'=>'required|date_format:Y-m-d',
            'city'=>'required',
            'address'=>'required',
            'subDistrict'=>'required',
            'village'=>'required',
            'postCode'=>'required|numeric',
            'phone'=>'required',
            // 'email'=>'required',
            'JHT'=>'required|in:Y,N',
            'JKK'=>'in:Y',
            'JKM'=>'in:Y',
            'periodeSelect'=>'required|numeric',
            'income'=>'required|numeric',
            'jobLocationCode'=>'required|numeric',
            'workType'=>'required',
            'startWorkingHours'=>'required|date_format:H:i',
            'endWorkingHours'=>'required|date_format:H:i',
            // 'notifySMS'=>'required',
            'provinceCode'=>'required|numeric',
            'districtCode'=>'required|numeric',
            'branchOfficeCode'=>'required'	
        ]);

        $parts = array(
            'nik' => $request->nik,
            'namaKtp' => $request->ktpName,
            'expNik' => $this->formatDate($request->expNik),
            'tempatLahir' => $request->birthPlace,
            'tgLahir' => $this->formatDate($request->birthDate),
            'kotaDomisili' => $request->city,
            'alamat' => $request->address,
            'kecamatan' => $request->subDistrict,
            'kelurahan' => $request->village,
            'kodepos' => $request->postCode,
            'noPonsel' => $request->phone,
            'email' => $request->email,
            'JHT' => $request->JHT,
            'JKK' => $request->JKK,
            'JKM' => $request->JKM,
            'periodeSelect' => $request->periodeSelect,
            'jmPenghasilan' => $request->income,
            'lokasiPekerjaan' => $request->jobLocationCode,
            'jenisPekerjaan' => $request->workType,
            'jkStart' => $request->startWorkingHours,
            'jkStop' => $request->endWorkingHours,
            'notifySMS' => $request->notifySMS,
            'kodeProvKantor' => $request->provinceCode,
            'kodeKabKantor' => $request->districtCode,
            'kodeKantorCab' => $request->branchOfficeCode	
        );
        
        return $this->call(['data' => $parts],'registration');
    }

    public function payDues($request)
    {
        $this->validate($request,[
            'duesCode'=>'required'
        ]);

        return $this->call([
            'kodeIuran'=>$request->duesCode
        ],'bayarIuran');
    }

    public function inquiryDuesByNIK($request)
    {
        $this->validate($request,[
            'nik'=>'required|numeric'
        ]);

        return $this->call([
            'nik'=>$request->nik
        ],'inquiryKodeIuranByNIK');
    }

    public function calculateDues($request)
    {
        $this->validate($request,[
            'income'=>'required',
            'JHT'=>'required|in:Y,N',
            'JKK'=>'in:Y',
            'JKM'=>'in:Y',
            'jobPlaceCode'=>'required',
            'periodeSelect'=>'required',
        ]);

        $params = [ 
            'jmPenghasilan' => $request->income,
            'JHT' => $request->JHT,
            'JKK' => $request->JKK,
            'JKM' => $request->JKM,
            'lokasiPekerjaan' => $request->jobPlaceCode,
            'periodeSelect' => $request->periodeSelect
        ];
        
        return $this->call(['data'=>$params],'hitungIuran');
    }

    public function inquiryDuesCode($request)
    {
        $this->validate($request,[
            'duesCode'=>'required'
        ]);

        return $this->call([
            'kodeIuran'=>$request->duesCode
        ],'inquiryKodeIuran');
    }

    public function inquiryReprint($request)
    {
        $this->validate($request,[
            'duesCode'=>'required'
        ]);

        return $this->call([
            'kodeIuran'=>$request->duesCode
        ],'inquiryCetakUlang');
    }

    public function participantData($request)
    {
        $this->validate($request,[
            'nik'=>'required'
        ]);

        return $this->call([
            'nik'=>$request->nik
        ],'getDataPeserta');
    }

    public function programSelect($request)
    {
        $this->validate($request,[
            'nik'=>'required',
            'income'=>'required',
            'JHT'=>'required|in:Y,N',
            'JKK'=>'in:Y',
            'JKM'=>'in:Y',
            'jobLocationCode'=>'required',
            'periodeSelect'=>'required',
            'workType'=>'required',
            'startWorkingHours'=>'required',
            'endWorkingHours'=>'required',
        ]);

        return $this->call([
            'data'=>[
                'nik' => $request->nik,
                'JHT' => $request->JHT,
                'JKK' => $request->JKK,
                'JKM' => $request->JKM,
                'lokasiPekerjaan' => $request->jobLocationCode,
                'periodeSelect' => $request->periodeSelect,
                'jmPenghasilan' => $request->income,
                'jenisPekerjaan' => $request->workType,
                'jkStart' => $request->startWorkingHours,
                'jkStop' => $request->endWorkingHours,
            ]
        ],'pilihProgram');
    }

}