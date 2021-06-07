<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arbre;
use App\Element;
use App\Attribut;
use App\Http\Resources\AttributResource;

class AttributController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Arbre $arbre,Element $element)
    {
        return AttributResource::collection($element->attributs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Arbre $arbre,Element $element)
    {
        $attribut = new Attribut($request->all());
        $element->attributs()->save($attribut);
        return response()->json(['message'=>'attribut Saved','data'=>$attribut],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Arbre $arbre,Element $element,Attribut $attribut)
    {
        return response()->json(['message'=>'Success','data'=>$attribut],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arbre $arbre,Element $element,Attribut $attribut)
    {
        $attribut->update($request->all());
        return response()->json(['message'=>'attribut Updated','data'=>$attribut],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arbre $arbre,Element $element,Attribut $attribut)
    {
        if($attribut->delete()){
            return response()->json(['message'=>'attribut Deleted','data'=>null],200);
        }
        return response()->json(['message'=>'Error Occured','data'=>null],400);
    }
}
