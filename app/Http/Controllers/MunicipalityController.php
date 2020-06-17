<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Municipality;
use App\Department;

use Auth;

class MunicipalityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $municipalities = Municipality::where('fk_department', '=', $id)->get();
        return $municipalities;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $municipality = new Municipality;
        $municipality->name_municipality = $request->name_municipality;
        $municipality->fk_department = $request->fk_department;

        $municipality->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$municipality = Municipality::find($id);
        $municipalities = Municipality::where('fk_department', '=', $id)->get();
        return $municipalities;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::all();
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
        $municipality = Municipality::find($id);
        $municipality->name_municipality = $request->name_municipality;
        $municipality->fk_department = $request->fk_department;

        $municipality->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipality = Municipality::find($id);
        $municipality->delete();
    }
}
