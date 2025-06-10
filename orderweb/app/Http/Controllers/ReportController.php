<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Causal;
use App\Models\Observation;
use App\Models\Order;
use App\Models\Technician;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $technicians = Technician::all();
        return view('reports.index',compact('technicians'));
    }

    /**
     * reporte que genera el listado de todos los tecnicos
     * 
     */

    public function export_technicians()
    {
        $technicians = Technician::all();
        $data = array(
            'technicians' => $technicians
        );
        $pdf = Pdf::loadView('reports.export_technicians', $data)->setPaper('letter','portrait')
        ->setOptions([
            'defaultFont' =>'sans-serif',
            'isRemoteEnabled' => true
        ]); //landscape: horizontal
        return $pdf->download('technician.pdf');
    }


    /**
     * reporte que genera listado de atividades de un tecnico
     */

    public function export_activities_by_technician(Request $request)
    {
        
        $activities = Activity::where('technician_id', $request['technician_id'])->get();

    
        $data = array(
            'activities' => $activities
        );
        $pdf = Pdf::loadView('reports.export_activities_by_technician', $data)->setPaper('letter','portrait')
        ->setOptions([
            'defaultFont' =>'sans-serif',
            'isRemoteEnabled' => true
        ]);
        return $pdf->download('ActivitiesByTechnician-'.$request['technician_id'].'.pdf');
    }

    public function export_orders_by_date(Request $request){
    //dd($request);
    $orders = DB::table('order')->whereBetween($request,['legalization_date_start','legalization_date_end'])->get();
    $causals = Causal::where('description', $request['causal_id'])->get();
    $observations = Observation::where('description', $request['observation_id'])->get();

    $data = array(
        'orders' => $orders,
        'causals' => $causals,
        'observations' => $observations
    );

    $pdf = Pdf::loadView('reports.export_orders_by_date', $data)->setPaper('letter','portrait')
        ->setOptions([
            'defaultFont' =>'sans-serif', 
            'isRemoteEnabled' => true
        ]);
        
        return $pdf->download('reports.Orders_By_Date-'.$request['order_id'].'.pdf');
    

    
}
}