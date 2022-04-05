<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Update;
use App\Medical;
class MedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records=Medical::all();
        $count=Contact::count();
        $messages = Contact::paginate(5);
        return view('BJMP.admin.records.medical.index',compact('records','count','messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $records=Medical::all();
        return view('BJMP.admin.records.medical.pdf',compact('records'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Medical::create(
            $request->all()
        );
        return redirect()->back();
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
        //
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
        $medical = Medical::findOrFail($id);

        $medical->name = $request->input('name');
        $medical->birthdate = $request->input('birthdate');
        $medical->age = $request->input('age');
        $medical->address = $request->input('address');
        $medical->emergency_contact = $request->input('emergency_contact');
        $medical->relationship= $request->input('relationship');
        $medical->allergies = $request->input('allergies');
        $medical->current_medication = $request->input('current_medication');
        $medical->current_health_status = $request->input('current_health_status');
        $medical->medical_history = $request->input('medical_history');

        $medical->update();

        return redirect()->route('medical.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
