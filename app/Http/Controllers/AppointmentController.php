<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Patient;
use App\Events\Event;
use App\Http\Requests\Validation\StoreAppointment;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments.all',['appointments' => $appointments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $patients = Patient::all();
        return view('appointments.new',['patients' => $patients]);
    }


    public function getCalendar()
    {

        # code...
        /*
        $e1 =  new Event('aaaaaaaa', '2020-09-08 10:00:00 GMT+0100 (UTC+01:00)' , 'Sun Sep 06 2020 11:00:00 GMT+0100 (UTC+01:00)');
        $e2 =  new Event('ssssssssss', '2020-09-06 8:00:00 GMT+0100 (UTC+01:00)' , 'Sun Sep 06 2020 9:00:00 GMT+0100 (UTC+01:00)');
        

        array_push($appointments, $e1);
        array_push($appointments, $e2);
        */
        $appointmentsArray = array();
        $appointments = Appointment::all();
        foreach ($appointments as $appointment) {
            $target = $appointment->patient->firstname .' '.$appointment->patient->lastname.'-'.$appointment->patient->id;
            $end = $appointment->hour + 1 ;
            array_push($appointmentsArray, new Event(
                                                $target,
                                                $appointment->date_appmnt . ' '.$appointment->hour.':00:00 GMT+0100 (UTC+01:00)' ,
                                                $appointment->date_appmnt . ' '.$end.':00:00 GMT+0100 (UTC+01:00)' 
                                                ));
            
        }
       // dd($appointmentsArray);
        return response()->json($appointmentsArray);
    }

    public function getFreeHours($day)
    {
        //
        $defaultHours = [
                        10 =>10,
                        11 => 11,
                        12 => 12,
                        13 => 13,
                        14 => 14,
                        15 => 15,
                        16 => 16,
                        17 => 17
                    ];

        $date_appmnt = \DateTime::createFromFormat('m-d-Y', $day);
        $data =  $date_appmnt->format('Y-m-d');
       // dd($data);
        $appointments = Appointment::where('date_appmnt', $data)->get();
        foreach ($appointments as $appointment) {
                unset($defaultHours[$appointment->hour]);
        }

        return response()->json($defaultHours);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointment $request)
    {
        //
        $data = $request->all();
        unset($data['_token']);
        $date_appmnt = \DateTime::createFromFormat('d/m/Y', $data['date_appmnt']);
        $data['date_appmnt'] =  $date_appmnt->format('Y-d-m');
        $appointment = new Appointment();
        $appointment->hour = $data['hour'];
        $appointment->date_appmnt = $data['date_appmnt'];
        $appointment->validate = 0;
        $appointment->id_patient = $data['patient'];
        $appointment->save();
        return redirect()->route('all_appointment')->with('status', 'Appointment added with success!');
        //'date_appmnt', 'hour', 'validate', 'id_patient'
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
        //
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
