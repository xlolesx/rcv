<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Policy;
use App\Payment;
use DB;
use Carbon\Carbon;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;
        
        $payments = Payment::where('user_id',$user_id)->get();
        return view('user-modules.Payments.payments-index', compact('payments'));
    }

    public function index_admin()
    {
        $users = User::all();
        $payments = Payment::all();
        return view('admin-modules.Payments.admin-payments-index', compact('users', 'payments'));
    }


    //ESTA FUNCION CUENTA LA CANTIDAD DE VEHICULOS DE POLIZAS QUE NO HAN SIDO PAGADAS
    public static function count_vehicles($user_id, $type = FALSE, $paid = FALSE)
    {
        if ($paid == FALSE) {
            $vehicle_type = Policy::select('vehicle_type')->where('user_id', $user_id)->where('status', 'FALSE')->get();
        }else{
            $vehicle_type = Policy::select('vehicle_type')->where('user_id', $user_id)->get();
        }

        $vehicles = [];
        foreach ($vehicle_type as $row) {
            if($row->vehicle_type == $type){
                array_push($vehicles, $row);
            }
        }
        
        $counted_vehicles = count($vehicles);
        return $counted_vehicles;
    }

    public static function sum_vehicles_prices($user_id, $type = FALSE)
    {
        $prices = Policy::select('price_id')
        ->where('user_id', $user_id)
        ->where('status', 'FALSE')
        ->where('vehicle_type', $type)
        ->get();

        $total_arr = [];
        foreach($prices as $price){
          array_push($total_arr, $price->price->total_all);
      }

      $operation = array_sum($total_arr);
      return $operation;
  }

  public static function profit_percentage($value1, $value2)
  {
    $result = ($value2 * $value1) / 100;
    return $result;
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_admin(Request $request, $id)
    {
        $from_raw = Policy::where('user_id', $id)
        ->where('status', FALSE)
        ->orderBy('created_at', 'asc')
        ->limit(1)
        ->get('created_at');
        
        $until_raw = Policy::where('user_id', $id)
        ->where('status', FALSE)
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->get('created_at');

        $from = Carbon::parse($from_raw[0]->created_at);
        $until = Carbon::parse($until_raw[0]->created_at);
        // echo $from;
        // exit();

        $payment = new Payment;
        $payment->name = $request->name;
        $payment->office = $request->office;
        $payment->user_id = $request->user_id;
        $payment->cpvca =  $request->cpvca;
        $payment->cpvm =  $request->cpvm;
        $payment->totalca = $request->totalca;
        $payment->totalm = $request->totalm;
        $payment->total = $request->total;
        $payment->profit_percentage = $request->profit_percentage;
        $payment->total_payment = $request->total_payment;
        $payment->from = $from;
        $payment->until = $until;
        $payment->save();
        $policy_update = Policy::where('user_id', $id)->where('status', FALSE)->update(['status'=> TRUE]);
        // $policy_update->save();

        return redirect('/admin/index-payments')->with('success', 'Pago realizado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_admin($id)
    {
        $payments = Payment::where('user_id', $id)->get();
        return view('admin-modules.Payments.admin-payment-show', compact('id','payments'));
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
        $this->validate(
            $request,[
              'bill' => ['required','mimes:jpeg,bmp,png,gif,svg,pdf']  
          ]);

        $payment = Payment::findOrFail($id);
        $payment->bill = $request->file('bill')->store('public');

        $payment->update();

        return redirect()->back()->with('success', 'Comprobante adjuntado exitosamente');
    }

}
