<?php

namespace App\Http\Controllers;

use App\Appointment;

use Illuminate\Http\Request;

class ChartsController extends Controller
{


    public function getAppointments()
    {
        $appointments = \DB::table('appointments')
                 ->select('date_appmnt', \DB::raw('count(*) as total'))
                 ->groupBy('date_appmnt')
                 ->get();

        return response()->json($appointments);
    }

    public function getConsultations()
    {
        $consultations = \DB::table('consultations')
                 ->select('date_consultation', \DB::raw('count(*) as total'))
                 ->groupBy('date_consultation')
                 ->get();

        return response()->json($consultations);
    }

    public function getOrders()
    {
        $orders = \DB::table('orders')
                 ->select('date_order', \DB::raw('count(*) as total'))
                 ->groupBy('date_order')
                 ->get();

        return response()->json($orders);
    }

    public function getPatients()
    {
        $patients = \DB::table('patients')
                 ->select('sex', \DB::raw('count(*) as total'))
                 ->groupBy('sex')
                 ->get();

        return response()->json($patients);
    }


    




    
}
