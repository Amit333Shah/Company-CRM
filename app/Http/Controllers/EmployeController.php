<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employe=Employe::paginate(2);
        return view('employe.index')->with('employe',$employe);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'employe_email'=>'required|email',
            'phone'=>'required',
        ]);
        $employe=new Employe;
        $employe->first_name=$request->first_name;
        $employe->last_name=$request->last_name;
        $employe->employe_email=$request->employe_email	;
        $employe->phone=$request->phone;
        $employe->company_id=$request->company_id;
        $qurry=$employe->save();
        if($qurry){
            return back()->with('success','Insert Succesfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $EmployeResource)
    {
        return view('employe.employeEdit')->with('employeData',$EmployeResource);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $EmployeResource)
    {
        if($request->first_name===null || $request->last_name===null || $request->employe_email===null||$request->phone==null){
            return back()->with('fail','All Fields are required !!!');
        }
        
       
        $EmployeResource->first_name=$request->first_name;
        $EmployeResource->last_name=$request->last_name;
        $EmployeResource->employe_email=$request->employe_email;
        $EmployeResource->phone=$request->phone;
        $query=$$EmployeResource->save();

        if($query){
            return redirect()->route('EmployeResource.index')->with('success','Updated Successfully');;
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $EmployeResource)
    {
        $qurry=$EmployeResource->delete();
        if($qurry){
            return back()->with('success','Deleted successfully');
        }
    }
}
