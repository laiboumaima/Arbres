<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arbre;
use App\Element;
use App\Attribut;
use App\Http\Resources\ElementResource;
class ElementController extends Controller
{
    public function index(Arbre $arbre)
    {
       // return ElementResource::collection($arbre->elements);
        return response($arbre->elements);

    }
    //store 
  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request, Arbre $arbre)
    {
     
    $element = new Element($request->all());
        $arbre->elements()->save($element);
        return  response($element, 201);
    }
 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Arbre $arbre,Element $element)
    {    
        return response($element,201);
    }

    public function show_attributs(Element $element){
    
        $element = $element->attributs;
        if(count($element) > 0){
            return response($element,201);
        }
            return response()->json(['message'=>'No attributs Found','data'=>null],200);
    }
 
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Arbre $arbre, Element $element)
    {  
        $element->update($request->all());
        return  response($element,200);
    }
 
   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arbre $arbre,Element $element)
    {
        if($element->delete()){
            return response()->json(['message'=>'element Deleted','data'=>null],200);
        }
        return response()->json(['message'=>'Error Occured','data'=>null],400);
    }
 
 
 
 
 
 
 
 
 
 
 
  

}
