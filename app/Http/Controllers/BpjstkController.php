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

    public function verifyKtp($request)
    {
        $parts = array(
            'nik' => $request->nik,
            'namaKtp' => $request->ktpName,
            'tgLahir' => $request->birthDate,
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
        return $this->call(['kodeProvinsi' => $request->provinceCode],'getKabupaten');
    }

    public function branchOffices($request)
    {
        return $this->call(['kodeKabupaten' => $request->districtsCode],'getKantorCabang');
    }

    public function registration($request)
    {
        $parts = array(
            'nik' => $request->nik,
            'namaKtp' => $request->ktpName,
            'expNik' => $request->expNik,
            'tempatLahir' => $request->birthPlace,
            'tgLahir' => $request->birthDate,
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
            'lokasiPekerjaan' => $request->jobPlace,
            'jenisPekerjaan' => $request->workType,
            'jkStart' => $request->jkStart,
            'jkStop' => $request->jkStop,
            'notifySMS' => $request->notifySMS,
            'kodeProvKantor' => $request->provinceOfficeCode,
            'kodeKabKantor' => $request->cityOfficeCode,
            'kodeKantorCab' => $request->branchOfficeCode	
        );
        
        return $this->call(['data' => $parts],'registration');
    }

    public function billCheck($request)
    {

    }

    public function billPayment($request)
    {
        
    }

}