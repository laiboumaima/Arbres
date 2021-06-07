<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use App\Arbre;
use App\Element;
use App\Http\Resources\ArbreResource;
class ArbreController extends Controller
{
    public function index()
    {
        $arbres = Arbre::all();
        return response()->json($arbres);
    }
    //store 
  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request)
    {
        $arbre = Arbre::create($request->all());
        return response($arbre, 201);
    }

 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Arbre $arbre)
    {  
        return response($arbre,201);
    }

    public function show_elemnts(Arbre $arbre){
    
        $elems = $arbre->elements;
        if(count($elems) > 0){
            return response($elems,200);
        }
            return response()->json(['message'=>'No elements Found','data'=>null],200);
    }
 
 
 
   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arbre $arbre)
    {
        if($arbre->delete()){
            return response()->json(['message'=>'arbre Deleted','data'=>null],200);
        }
        return response()->json(['message'=>'Error Occured','data'=>null],400);
    }
 
 
 
 
 
 
 
  /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
 
    public function update(Request $request, Arbre $arbre) {
    
        $arbre->update($request->all());
        return response($arbre, 200);
    }
    public function gettallarbre(){
        $arbres = Arbre::all();
        return view('arbres',compact('arbres'));
    }
    public function downloadpdf(Arbre $arbre){
        $elems = $arbre->elements;
        $pdf = PDF::loadView('arbres',compact('elems','arbre'));
        return $pdf->download('arbre.pdf');
    }
 
 
 




}
