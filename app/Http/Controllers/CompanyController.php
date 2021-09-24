<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company=Company::all();
        return view('company.index')->with('company',$company);
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
    public function store(Request $request)
    {
        $request->validate([
            'Name'=>'required',
            'email'=>'required|email',
            'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|dimensions:min_width=100,min_height=100',
        ]);
        $company=new Company;
        $company->name=$request->Name;
        $company->email=$request->email;
        $company->logo=$request->logo->store('image');
        $qurry=$company->save();
        if($qurry){
            return back()->with('success','Insert Succesfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $CompanyResource)
    {
        return view('company.companyEdit')->with('companyData',$CompanyResource);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $CompanyResource)
    {
        if($request->name===null || $request->email===null || $request->logo===null){
            return back()->with('fail','All Fields are required !!!');
        }
        
       
        $CompanyResource->name=$request->name;
        $CompanyResource->email=$request->email;
        $CompanyResource->logo=$request->logo->store('image');
        $query=$CompanyResource->save();

        if($query){
            return redirect()->route('CompanyResource.index')->with('success','Updated Successfully');;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $CompanyResource)
    {
        $qurry=$CompanyResource->delete();
        if($qurry){
            return back()->with('success','Deleted successfully');
        }
    }
}
