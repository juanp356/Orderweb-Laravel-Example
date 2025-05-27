<?php

namespace App\Http\Controllers;

use App\Models\TypeActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function Ramsey\Uuid\v1;

class TypeActivityController extends Controller
{
      private $rules = [
        'description' => 'required |string|min:3|max:100'
    ];

    private $traductionAttributes = [
        'description' => 'descripcion'
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeactivities = TypeActivity::all();
        return view('type_activity.index',compact('typeactivities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type_activity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $validator = Validator::make($request->all(),$this->rules);
       $validator->setAttributeNames($this->traductionAttributes);
       if($validator->fails())
       {
            $errors = $validator->errors();
            return redirect()->route('type_activity.create')->withInput()->withErrors($errors);
       }
        $typeactivity = TypeActivity::create($request->all());
        session()->flash('message','Registro creado exitosamente');
         return redirect()->route('type_activity.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $typeactivity = TypeActivity::find($id);

        if($typeactivity){
             return view('type_activity.edit',compact('typeactivity'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $validator = Validator::make($request->all(),$this->rules);
       $validator->setAttributeNames($this->traductionAttributes);
       if($validator->fails())
       {
            $errors = $validator->errors();
            return redirect()->route('type_activity.edit',$id)->withInput()->withErrors($errors);
       }
          $typeactivity = TypeActivity::find($id);

        if($typeactivity){
            $typeactivity->update($request->all());
             session()->flash('message','Registro actualizado exitosamente');
        }
        else
        {
            session()->flash('warning','No se encuentra el registro solicitado');
        }
        return redirect()->route('type_activity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $typeactivity = TypeActivity::find($id);

        if($typeactivity){
            $typeactivity->delete();
            session()->flash('message','Registro eliminado exitosamente');
        }
        else{
              session()->flash('warning','No se encuentra el registro solicitado');
        }
         return redirect()->route('type_activity.index');
    }
}
