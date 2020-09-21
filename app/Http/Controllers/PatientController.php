<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Http\Requests\Validation\StorePatient;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        //dd($patients);
        return view('patients.all', ['patients'=>$patients ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('patients.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatient $request)
    {
        //
        $data = $request->all();
        unset($data['_token']);
        $birthday = \DateTime::createFromFormat('d/m/Y', $data['birthday']);
        $data['birthday'] =  $birthday->format('Y-m-d H:i:s');

        $patient = new Patient();
        $patient->firstname = $data['firstname'];
        $patient->lastname = $data['lastname'];
        $patient->sex = $data['sex'];
        $patient->address = $data['address'];
        $patient->phone = $data['phone'];
        $patient->email = $data['email'];
        $patient->birthday = $data['birthday'];
        $patient->save();
        
        return redirect()->route('all_patient')->with('status', 'Patient added with success!');

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
        $patient = Patient::find($id);
        return view('patients.edit',['patient' => $patient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePatient $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        //dd($data);
        $birthday = \DateTime::createFromFormat('Y-m-d', $data['birthday']);
        $data['birthday'] =  $birthday->format('Y-m-d H:i:s');

        $patient = Patient::find($id);
        $patient->firstname = $data['firstname'];
        $patient->lastname = $data['lastname'];
        $patient->sex = $data['sex'];
        $patient->address = $data['address'];
        $patient->phone = $data['phone'];
        $patient->email = $data['email'];
        $patient->birthday = $data['birthday'];
        $patient->save();
        
        return redirect()->route('all_patient')->with('status', 'Patient updated with success!');
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
