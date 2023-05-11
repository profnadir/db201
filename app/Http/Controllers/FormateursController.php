<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormateursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formateurs = DB::table('formateurs')->oldest('id')->get();
        $age_moy = DB::table('formateurs')->avg('age');
        //$formateurs = DB::table('formateurs')->orderBy('nom','desc')->get();
        return view('formateurs.index',compact('formateurs','age_moy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formateurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation


        //save db : query builder

        DB::table('formateurs')->insert([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'age'=>$request->age
        ]);

        //redirection
        return redirect()->route('formateurs.index')
                        ->with('success','formateurs created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formateur = DB::table('formateurs')->where('id','=',$id)->first();
        return view('formateurs.edit',compact('formateur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation 

        // update db : QB
        DB::table('formateurs')->where('id','=',$id)->update([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'age'=>$request->age
        ]);

        //redirection
        return redirect()->route('formateurs.index')
                        ->with('success','formateurs updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('formateurs')->where('id','=',$id)->delete();

        //redirection
        return redirect()->route('formateurs.index')
                        ->with('success','formateurs deleted !');
    }
}
