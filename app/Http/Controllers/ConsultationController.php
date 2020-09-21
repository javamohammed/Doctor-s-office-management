<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Consultation;
use App\Order;
use App\Medicament;
use App\Medicament_selected;
use App\Http\Requests\Validation\StoreSetMedicament;
use PDF;
class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $consultations = Consultation::all();
       return \view('consultations.all', ['consultations'=> $consultations]);
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
    public function store(Request $request, $id_patient)
    {
        //
        $patient = Patient::find($id_patient);
        $data = $request->all();
        if(!$patient || empty(trim($data['diagnostic']," ") ) )
        {
            return redirect()->route('all_appointment')->with('error', 'Bad request please check your consultation and select a correct appointment !');
        }
        $today  = date("yy-m-d");  
        $consultation = new Consultation;
        $consultation->id_patient = $id_patient;
        $consultation->diagnostic = $data['diagnostic'];
        $consultation->date_consultation = $today;
        $consultation->save();
        
        return redirect()->route('all_consultation')->with('status', 'Consultation added with success!');
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
        $consultation = Consultation::find($id);
        return view('consultations.edit',['consultation' => $consultation]);
    }
    public function order($id)
    {
        //
        $consultation = Consultation::find($id);
        $order =  new Order;
        $today  = date("yy-m-d");  
        $order->date_order = $today;
        $order->id_consultation = $consultation->id;
        $order->save();
        return redirect()->route('all_consultation')->with('status', 'Order saved with success!');
    }

    public function orders()
    {
     
        $orders = Order::all();
       return \view('orders.all', ['orders'=> $orders]);
    }

    public function setMedicaments($id)
    {
        
        $medicaments = Medicament::all();
        $medicament_selected = Medicament_selected::where('id_order', $id)->get();
        //dd($medicament_selected);
        return \view('orders.set_medicaments', ['medicament_selected' => $medicament_selected, 'id_order' => $id, 'medicaments' => $medicaments]);
    }

    public function SaveSetMedicaments(StoreSetMedicament $request, $id)
    {
        $data = $request->all();
       
        foreach ($data['medicaments'] as  $id_medicament ) {
            $medicament_selected = new Medicament_selected;
            $medicament_selected->description = $data['description'];
            $medicament_selected->id_order  = $id;
            $medicament_selected->id_medicament  = $id_medicament;
            $medicament_selected->save(); 
        }
        return redirect()->route('orders_consultation')->with('status', 'The Medicaments for this order #'.$id.' are saved with success!');
    }
    
    public function printOrder($id)
    {
        $order = Order::find($id);
        $pdf = PDF::loadView('orders.print', ['order' => $order]);

        // download PDF file with download method
        return $pdf->download('file_order_'.$order->id.'.pdf');
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
        $request->validate([
            'diagnostic' => 'required',
        ]);
        $data = $request->all();

        $consultation = Consultation::find($id);
        $consultation->diagnostic = $data['diagnostic'];
        $consultation->save();
        
        return redirect()->route('all_consultation')->with('status', 'Consultation updated with success!');
    }

    public function print($id){

        $consultation = Consultation::find($id);
        $pdf = PDF::loadView('consultations.print', ['consultation' => $consultation]);

        // download PDF file with download method
        return $pdf->download('file_diagnostic_'.$consultation->patient->firstname.'-'.$consultation->patient->lastname.'.pdf');
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
