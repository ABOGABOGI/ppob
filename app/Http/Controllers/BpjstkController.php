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
            
            
            default:
                return 404;
                break;
        }
    }

    public function verifyKtp($request)
    {
        $parts = array(
            'nik' => $request->nik,
            'namaKtp' => $request->ktpName,
            'tgLahir' => $request->birtDate,
            'noPonsel' => $request->phone,
        
        );
        
        return $this->call(['data' => $parts],'verifyKTPeL');
    }

    public function jobLocation()
    {
        return $this->call([],'getLokasiKerja');
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