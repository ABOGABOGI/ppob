<?php 

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    use \App\HDP\BasicCrud;

    public $model = '\App\Models\Account';
    
    // public $typeDelete = 'soft';
    // public $dataDelete = ['status'=>'DECLINED'];
    
    public $insertValidation = [
        'balance' => 'required|numeric',
        'recStatus'=>'in:DELETE,DRAFT,ARCHIVE,PUBLISH'
    ];
    
    public $updateValidation = [
        'balance' => 'required|numeric',
        'id'=>'required|numeric',
        'recStatus'=>'in:DELETE,DRAFT,ARCHIVE,PUBLISH'
    ];
}
