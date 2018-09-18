<?php

namespace App\Http\Controllers;

use App\Http\Requests\phonebookRequest;
use App\phonebook;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return view('phoneBook');
    }
    public function getdata()
    {
          return phonebook::orderBy('name','ASC')->get();
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
    public function store(phonebookRequest $request)
    {
        $phone = new phonebook;
        $phone->name = $request->name;
        $phone->phone = $request->phone;
        $phone->email = $request->email;
        $phone->save();
        return $phone;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function show(phonebook $phonebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(phonebook $phonebook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function update(phonebookRequest $request)
    {
        $phone = phonebook::find($request->id);
        $phone->name = $request->name;
        $phone->phone = $request->phone;
        $phone->email = $request->email;
        $phone->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(phonebook $phonebook)
    {
        phonebook::where('id',$phonebook->id)->delete();
    }
}
