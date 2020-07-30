<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Price;
use App\Policy;
use App\Vehicle;
use App\Relation_p_o as PO;
use PDF;
USE Carbon\Carbon;

class PoliciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = Auth::user();
        $user_id = $user->id;
        $today = Carbon::now();
        $policies = User::find($user_id)->policies;
        $counter = 0;

        return view('user-modules.Policies.policies-index', compact('policies', 'counter', 'today'));
    }

    public function index_admin()
    {
        $policies = Policy::all();
        $today = Carbon::now();
        $counter = 0;

        return view('admin-modules.Policies.admin-policies-index', compact('policies', 'counter', 'today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prices = Price::all();
        $vehicles = Vehicle::distinct()->get('brand');
        return view('user-modules.Policies.policies-create', compact('prices', 'vehicles'));
    }

    public function create_admin()
    {
        $prices = Price::all();
        $vehicles = Vehicle::distinct()->get('brand');
        return view('admin-modules.Policies.admin-policies-create', compact('prices', 'vehicles'));
    }

    public function search(Request $request)
    {
        if($request->ajax()) {
            // $data = Vehicle::where('brand', 'LIKE', $request->vehicle.'%')->orWhere('model', 'LIKE', $request->vehicle.'%')->get();
            $data = Vehicle::where('brand', 'LIKE', $request->brandId.'%')->get();
            // declare an empty array for output
            $output = '';
            $output = '<option value="0"> - Seleccionar Modelo - </option>';
            // if searched countries count is larger than zero
            
            foreach ($data as $row) {
                $output .= '<option value="'.$row->model.'">'.$row->model.'</option>';
            }

            return $output;
        }
    }

    public function price_view(Request $request)
    {
        if ($request->ajax()) {
            $data = Price::where('id', $request->priceId)->get();

            $price_info = '';

            foreach ($data as $row) {
                $price_info .= '<div class="col-6">'.
                                    '<h6 class="mt-2"><span class="font-weight-bold">Daño a cosas: </span>'.'<span class="price_show">'.$row->damage_things.'</span>'.' Bs.S'.'</h6>'.
                                    '<h6><span class="font-weight-bold">Prima: </span>'.'<span class="price_show">'.$row->premium1.'</span>'.' Bs.S'.'</h6>'.

                                    '<h6 class="mt-3"><span class="font-weight-bold">Invalidez: </span>'.'<span class="price_show">'.$row->disability.'</span>'.' Bs.S'.'</h6>'.
                                    '<h6><span class="font-weight-bold">Prima: </span>'.'<span class="price_show">'.$row->premium3.'</span>'.' Bs.S'.'</h6>'.

                                    '<h6 class="mt-3"><span class="font-weight-bold">Muerte: </span>'.'<span class="price_show">'.$row->death.'</span>'.' Bs.S'.'</h6>'.
                                    '<h6><span class="font-weight-bold">Prima: </span>'.'<span class="price_show">'.$row->premium5.'</span>'.' Bs.S'.'</h6>'.

                                    '<h6 class="mt-4"><span class="font-weight-bold">Grua: </span>'.'<span class="price_show">'.$row->crane.'</span>'.' Bs.S'.'</h6>'.
                                    '<h6><span class="font-weight-bold">Total Prima: </span>'.'<span class="price_show">'.$row->total_premium.'</span>'.' Bs.S'.'</h6>'.
                                    '<h6 class="mt-4"><span class="font-weight-bold">Total Cobertura: </span>'.'<span class="price_show">'.$row->total_all.'</span>'.' Bs.S'.'</h6>'.

                                '</div>';
                $price_info .= '<div class="col-6">'.
                                    '<h6 class="mt-2"><span class="font-weight-bold">Daño a personas: </span>'.'<span class="price_show">'.$row->damage_people.'</span>'.' Bs.S'.'</h6>'.
                                    '<h6><span class="font-weight-bold">Prima: </span>'.'<span class="price_show">'.$row->premium2.'</span>'.' Bs.S'.'</h6>'.

                                    '<h6 class="mt-3"><span class="font-weight-bold">Asistencia Juridica: </span>'.'<span class="price_show">'.$row->legal_assistance.'</span>'.' Bs.S'.'</h6>'.
                                    '<h6><span class="font-weight-bold">Prima: </span>'.'<span class="price_show">'.$row->premium4.'</span>'.' Bs.S'.'</h6>'.

                                    '<h6 class="mt-3"><span class="font-weight-bold">Gastos Medicos: </span>'.'<span class="price_show">'.$row->medical_expenses.'</span>'.' Bs.S'.'</h6>'.
                                    '<h6><span class="font-weight-bold">Prima: </span>'.'<span class="price_show">'.$row->premium6.'</span>'.' Bs.S'.'</h6>'.
                                '</div>';
            }

            return $price_info;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request, [
                'client_name' => ['required', 'max:255', 'min:2', 'regex:/^[a-zA-Z_ ]+$/'],
                'client_lastname' => ['required', 'max:255', 'min:2', 'regex:/^[a-zA-Z_ ]+$/'],
                'client_email' => ['required', 'string', 'email', 'max:255'],
                'client_ci' => ['required', 'max:10', 'min:7', 'regex:/[^A-Za-z-\s]+$/'],
                'vehicleBrand' => ['required'],
                'vehicleModel' => ['required'],
                'vehicle_year' => ['required', 'numeric', 'min:1918', 'max:2100'],
                'type' => ['required'],
                'vehicle_color' => ['required', 'max:25', 'min:2', 'regex:/^[a-zA-Z_ ]+$/'],
                'used_for' => ['required'],
                'vehicle_bodywork_serial' => ['required', 'max:25', 'min:2', 'alpha_num'],
                'vehicle_motor_serial'  => ['required', 'max:25', 'min:2', 'alpha_num'],
                'vehicle_certificate_number' => ['required', 'max:25', 'min:2', 'alpha_num'],
                'vehicle_registration' => ['required', 'max:15', 'min:2', 'alpha_num'],
                'vehicle_weight' => ['required', 'regex:/[^A-Za-z-\s]+$/'],
                'price' => ['required'],
                'client_phone'      => ['min:5', 'max:8', 'regex:/[^A-Za-z-\s]+$/']
            ]);

        $vehicle_id = Vehicle::where('brand', $request->vehicleBrand)->where('model', $request->vehicleModel)->pluck('id');

        $vehicle_type = Vehicle::where('brand', $request->vehicleBrand)->where('model', $request->vehicleModel)->pluck('vehicle_type');

        // $vehicle_name = $request->vehicleBrand.' - '.$request->vehicleModel;

        $policy  = new Policy;

        $user           = Auth::user();
        $user_id        = $user->id;
        $client_ci      = $request->input('id_type').$request->input('client_ci');
        $vehicle_weight = $request->input('vehicle_weight').'Kg';

        $policy->user_id             = $user_id;
        $policy->price_id             = $request->input('price');

        //Fecha de vencimiento
        $expiring_date = Carbon::now()->addYear();
        $policy->expiring_date = $expiring_date;


        // Datos del vehiculo
        $policy->vehicle_id                 = $vehicle_id[0];
        $policy->vehicle_type               = $vehicle_type[0];
        $policy->vehicle_brand              = strtoupper($request->vehicleBrand);
        $policy->vehicle_model              = strtoupper($request->vehicleModel);
        $policy->type                       = strtoupper($request->input('type'));
        $policy->vehicle_year               = $request->input('vehicle_year');
        $policy->vehicle_color              = ucwords($request->input('vehicle_color'));
        $policy->vehicle_weight             = $vehicle_weight;
        $policy->vehicle_bodywork_serial    = strtoupper($request->input('vehicle_bodywork_serial'));
        $policy->vehicle_motor_serial       = strtoupper($request->input('vehicle_motor_serial'));
        $policy->vehicle_certificate_number = strtoupper($request->input('vehicle_certificate_number'));
        $policy->vehicle_registration       = strtoupper($request->input('vehicle_registration'));
        $policy->used_for                   = $request->input('used_for');

        // Datos del cliente
        $client_names = strtolower($request->input('client_name'));
        $client_lastname = strtolower($request->input('client_lastname'));

        $policy->client_name          = ucwords($client_names);
        $policy->client_lastname      = ucwords($client_lastname);
        $policy->client_email         = $request->input('client_email');
        $policy->client_phone         = $request->input('sp_prefix').$request->input('client_phone');
        $policy->client_ci            = strtoupper($client_ci);
        $policy->save();

        return redirect('/user/index-policies');
    }

    public function store_admin(Request $request)
    {        
        $this->validate(
            $request, [
                'client_name' => ['required', 'max:255', 'min:2', 'regex:/^[a-zA-Z_ ]+$/'],
                'client_lastname' => ['required', 'max:255', 'min:2', 'regex:/^[a-zA-Z_ ]+$/'],
                'client_email' => ['required', 'string', 'email', 'max:255'],
                'client_ci' => ['required', 'max:10', 'min:7', 'regex:/[^A-Za-z-\s]+$/'],
                'vehicleBrand' => ['required'],
                'vehicleModel' => ['required'],
                'vehicle_year' => ['required', 'numeric', 'min:1918', 'max:2100'],
                'type' => ['required'],
                'vehicle_color' => ['required', 'max:25', 'min:2', 'regex:/^[a-zA-Z_ ]+$/'],
                'used_for' => ['required'],
                'vehicle_bodywork_serial' => ['required', 'max:25', 'min:2', 'alpha_num'],
                'vehicle_motor_serial'  => ['required', 'max:25', 'min:2', 'alpha_num'],
                'vehicle_certificate_number' => ['required', 'max:25', 'min:2', 'alpha_num'],
                'vehicle_registration' => ['required', 'max:15', 'min:2', 'alpha_num'],
                'vehicle_weight' => ['required', 'regex:/[^A-Za-z-\s]+$/'],
                'price' => ['required'],
                'client_phone'      => ['min:5', 'max:8', 'regex:/[^A-Za-z-\s]+$/']
            ]);

        //Get Vehicle id from select option using pluck to get the value in an arry of 1 item
        $vehicle_id = Vehicle::where('brand', $request->vehicleBrand)->where('model', $request->vehicleModel)->pluck('id');

        //Get Vehicle type from select option using pluck to get the value in an arry of 1 item
        $vehicle_type = Vehicle::where('brand', $request->vehicleBrand)->where('model', $request->vehicleModel)->pluck('vehicle_type');

        // echo($vehicle_types);
        // echo $request->vehicleBrand;
        // exit();

        $policy  = new Policy;

        $user           = Auth::user();
        $user_id        = $user->id;
        $client_ci      = $request->input('id_type').$request->input('client_ci');
        $vehicle_weight = $request->input('vehicle_weight').'Kg';

        $policy->admin_id             = $user_id;
        $policy->price_id             = $request->input('price');
        
        //Fecha de vencimiento
        $expiring_date = Carbon::now()->addYear();
        $policy->expiring_date = $expiring_date;

        // Datos del vehiculo
        $policy->vehicle_id                 = $vehicle_id[0];
        $policy->vehicle_type               = $vehicle_type[0];
        $policy->vehicle_brand              = strtoupper($request->vehicleBrand);
        $policy->vehicle_model              = strtoupper($request->vehicleModel);
        $policy->type                       = strtoupper($request->input('type'));
        $policy->vehicle_year               = $request->input('vehicle_year');
        $policy->vehicle_color              = ucwords($request->input('vehicle_color'));
        $policy->vehicle_weight             = $vehicle_weight;
        $policy->vehicle_bodywork_serial    = strtoupper($request->input('vehicle_bodywork_serial'));
        $policy->vehicle_motor_serial       = strtoupper($request->input('vehicle_motor_serial'));
        $policy->vehicle_certificate_number = strtoupper($request->input('vehicle_certificate_number'));
        $policy->vehicle_registration       = strtoupper($request->input('vehicle_registration'));
        $policy->used_for                   = $request->input('used_for');

        // Datos del cliente        
        $client_names = strtolower($request->input('client_name'));
        $client_lastname = strtolower($request->input('client_lastname'));

        $policy->client_name          = ucwords($client_names);
        $policy->client_lastname      = ucwords($client_lastname);
        $policy->client_email         = $request->input('client_email');
        $policy->client_phone         = $request->input('sp_prefix').$request->input('client_phone');
        $policy->client_ci            = strtoupper($client_ci);
        $policy->save();
        
        return redirect('/admin/index-policies')->with('success'. 'Póliza registrada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $policy = Policy::findOrFail($id);
        $today = Carbon::now();
        $expiring_date = Carbon::parse($policy->expiring_date);

        return view('user-modules.Policies.policy-show', compact('policy', 'today','expiring_date'));
    }

    public function show_admin($id)
    {
        $policy = Policy::findOrFail($id);
        $today = Carbon::now();
        $expiring_date = Carbon::parse($policy->expiring_date);

        return view('admin-modules.Policies.admin-policy-show', compact('policy', 'today','expiring_date'));
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

    public function admin_edit($id)
    {
        $policy    = Policy::findOrFail($id);
        $vehicles  = Vehicle::all();
        $prices    = Price::all();

        $cedula = $policy->client_ci;
        $id_type = substr($cedula, 0, 2);

        $identification = preg_split('/[A-Z].*?-/', $cedula);
        array_push($identification, $id_type);

        $kilos = $policy->vehicle_weight;
        $weight_num = preg_split('/[A-Z].*/', $kilos);

        $phone = $policy->client_phone;
        $client_phone = preg_split('/-/', $phone);

        return  view('admin-modules.Policies.admin-policy-edit', compact('policy', 'id', 'vehicles', 'prices', 'identification', 'weight_num', 'client_phone'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_update(Request $request, $id)
    {
        $this->validate(
            $request, [
                'client_name' => ['required', 'max:255', 'min:2', 'regex:/^[a-zA-Z_ ]+$/'],
                'client_lastname' => ['required', 'max:255', 'min:2', 'regex:/^[a-zA-Z_ ]+$/'],
                'client_email' => ['required', 'string', 'email', 'max:255'],
                'client_ci' => ['required', 'max:10', 'min:7', 'regex:/[^A-Za-z-\s]+$/'],
                'vehicleBrand' => ['required'],
                'vehicleModel' => ['required'],
                'vehicle_year' => ['required', 'numeric', 'min:1918', 'max:2100'],
                'type' => ['required'],
                'vehicle_color' => ['required', 'max:25', 'min:2', 'regex:/^[a-zA-Z_ ]+$/'],
                'used_for' => ['required'],
                'vehicle_bodywork_serial' => ['required', 'max:25', 'min:2', 'alpha_num'],
                'vehicle_motor_serial'  => ['required', 'max:25', 'min:2', 'alpha_num'],
                'vehicle_certificate_number' => ['required', 'max:25', 'min:2', 'alpha_num'],
                'vehicle_registration' => ['required', 'max:15', 'min:2', 'alpha_num'],
                'vehicle_weight' => ['required', 'regex:/[^A-Za-z-\s]+$/'],
                'price' => ['required'],
                'client_phone'      => ['min:5', 'max:7', 'regex:/[^A-Za-z-\s]+$/']
            ]);


        //Get Vehicle id from select option using pluck to get the value in an arry of 1 item
        $vehicle_id = Vehicle::where('brand', $request->vehicleBrand)->where('model', $request->vehicleModel)->pluck('id');

        //Get Vehicle type from select option using pluck to get the value in an arry of 1 item
        $vehicle_type = Vehicle::where('brand', $request->vehicleBrand)->where('model', $request->vehicleModel)->pluck('vehicle_type');

        $policy  = Policy::findOrFail($id);
        
        $client_ci      = $request->input('id_type').$request->input('client_ci');
        $vehicle_weight = $request->input('vehicle_weight').'Kg';

        $policy->price_id             = $request->input('price');
        
        // Datos del vehiculo
        $policy->vehicle_id                 = $vehicle_id[0];
        $policy->vehicle_type               = $vehicle_type[0];
        $policy->vehicle_brand              = strtoupper($request->input('vehicleBrand'));
        $policy->vehicle_model              = strtoupper($request->input('vehicleModel'));
        $policy->type                       = strtoupper($request->input('type'));
        $policy->vehicle_year               = $request->input('vehicle_year');
        $policy->vehicle_color              = strtoupper($request->input('vehicle_color'));
        $policy->vehicle_weight             = $vehicle_weight;
        $policy->vehicle_bodywork_serial    = strtoupper($request->input('vehicle_bodywork_serial'));
        $policy->vehicle_motor_serial       = strtoupper($request->input('vehicle_motor_serial'));
        $policy->vehicle_certificate_number = strtoupper($request->input('vehicle_certificate_number'));
        $policy->vehicle_registration       = strtoupper($request->input('vehicle_registration'));
        $policy->used_for                   = strtoupper($request->input('used_for'));

        $policy->client_name          = strtoupper($request->input('client_name'));
        $policy->client_lastname      = strtoupper($request->input('client_lastname'));
        $policy->client_email         = $request->input('client_email');
        $policy->client_ci            = strtoupper($client_ci);
        $policy->save();
        
        return redirect('/admin/index-policies');
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

    public function admin_destroy($id)
    {
       $policies = Policy::findOrFail($id);
       $policies->delete();
       return redirect('/admin/index-policies');
    }

    public function user_exportpdf($id)
    {
        $policy = Policy::find($id);
        $counter = 0;

        $data = ['policy' => $policy];

        $pdf = PDF::loadView('user-modules.Policies.policy-pdf', $data)->setPaper('a4', 'portrait');

        $fileName = $policy->id . $policy->client_name . \Carbon\Carbon::parse($policy->created_at)->format('d-m-Y');

        return $pdf->stream($fileName . '.pdf');
    }

    public function admin_exportpdf($id)
    {
        $policy = Policy::find($id);
        $counter = 0;

        $data = ['policy' => $policy];

        $pdf = PDF::loadView('admin-modules.Policies.admin-policy-pdf', $data)->setPaper('a4', 'portrait');

        $fileName = $policy->id . $policy->client_name . \Carbon\Carbon::parse($policy->created_at)->format('d-m-Y');

        return $pdf->stream($fileName . '.pdf');
    }

    public function renew(Request $request, $id)
    {
        $expiring_date = Carbon::now()->addYear();
        $policy = Policy::find($id);
        $policy->expiring_date = $expiring_date;

        $policy->update();

        return redirect('/user/index-policies')->with('success', 'Póliza renovada correctamente');
    }    

    public function admin_renew(Request $request, $id)
    {
        $expiring_date = Carbon::now()->addYear();
        $policy = Policy::find($id);
        $policy->expiring_date = $expiring_date;

        $policy->update();

        return redirect('/admin/index-policies')->with('success', 'Póliza renovada correctamente');
    }
}
