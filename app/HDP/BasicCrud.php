<?php

namespace App\HDP;

use Illuminate\Http\Request;

trait BasicCrud
{
    
    public function index(Request $request){

        $this->responseCode = 200;

        if ($request->id) {
            $data = $this->model::where('id',$request->id)->get();
            $this->results = $data;
        } else {
            $data = $this->model::paginate(20);
            $this->results = $data->items();
            $this->metaData = [
                'selectedPage' => $data->currentPage(), 
                'selectedItem' => NULL, 
                'totalPage' => $data->lastPage(), 
                'totalItem' => $data->total(), 
                'totalItemPerPage' => count($data->items()) 
            ];
        }

        return $this->response();
    }

    public function store (Request $request){

        $this->validate($request, $this->insertValidation);

        $data = $this->model::create($request->all());

        $this->responseCode = 200;
        $this->results = $data;

        return $this->response();
    }

    public function update(Request $request){

        $this->validate($request, $this->updateValidation);

        $data = $this->model::find($request->id);
        if ($data) {
            $data->update($request->all());
            
            $this->responseCode = 200;
            $this->results = $data;
        }else{
            abort(404, 'ID is invalid');
        }

        return $this->response();
    }
    
    public function destroy($id){
        if (isset($this->typeDelete) == 'soft') {
            $data = $this->softDelete($id,$this->dataDelete);
        } else {
            $data = $this->hardDelete($id);
        }
        return $data;
    }

    protected function softDelete($id,$dataDelete)
    {

        $data = $this->model::find($id);
        if ($data) {
            $data->update($dataDelete);
            
            $this->responseCode = 200;
            $this->results = $data;
        }else{
            abort(404, 'ID is invalid');
        }

        return $this->response();
    }

    protected function hardDelete($id)
    {
        $data = $this->model::find($id);
        if ($data) {
            $data->delete();
        
            $this->responseCode = 200;
            $this->results = $data;
        } else {
            abort(404, 'ID is invalid');
        }
        
        return $this->response();
    }
}
