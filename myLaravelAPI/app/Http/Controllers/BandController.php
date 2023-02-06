<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function getAll(){
        $bands = $this->getBands();
        return response()->json([$bands]);
    }

    public function getById($id){
        $band = null;

        foreach($this->getBands() as $_band){
            if ($_band['id'] == $id)
                $band = $_band;
        }

        return $band ? response()->json([$band]) : abort(404);

    }

    public function getByGender($gender){
        $bands = [];

        foreach($this->getBands() as $_band){
            if ($_band['gender'] == $gender)
                $bands[] = $_band;
        }

        return $bands ? response()->json([$bands]) : abort(404);

    }

    public function store(Request $request){
        $validate = $request->validate([
            'id' => 'numeric',
            'name' => 'required|min:3'
        ]);

        return response()->json($request->all());

    }

    protected function getBands(){
        return [
            ['id'=>1, 'name'=>'dream feather', 'gender'=>'progressive'],
            ['id'=>2, 'name'=>'mega deth', 'gender'=>'trash metal'],
            ['id'=>3, 'name'=>'mettalica', 'gender'=>'heavy metal']
        ];
    }
}
