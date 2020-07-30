<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\User;
use Auth;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $vehicles = Vehicle::orderBy('id', 'asc')->paginate();
        // $user = Auth::user();
        // $user_id = $user->id;
        // $vehicles = User::find($user_id)->vehicles;
        $vehicles = Vehicle::all();
        $counter = 0;

        return view('user-modules.Vehicles.vehicles-index', compact('vehicles', 'counter'));
    }

    public function index_admin()
    {        
        // $vehicles = Vehicle::orderBy('created_at', 'asc')->paginate(10);
        $vehicles = Vehicle::orderBy('created_at', 'asc')->get();

        // $vehicles = Vehicle::all()->paginate($pagerNum);
        // $counter = 0;

        return view('admin-modules.Vehicles.admin-vehicles-index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-modules.Vehicles.vehicle-create');
    }

    public function create_admin()
    {
        return view('admin-modules.Vehicles.admin-vehicle-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'brand' => 'required|max:20',
            'model'=> 'required|max:20',
            'vehicleType' => 'required'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $vehicle = new Vehicle;
        $vehicle->user_id      = $user_id;
        $vehicle->brand        = strtoupper($request->input('brand'));
        $vehicle->model        = strtoupper($request->input('model'));
        $vehicle->vehicle_type =  $request->input('vehicleType');
        $vehicle->save();


        return redirect('/user/index-vehicles')->with('success', 'Vehiculo registrado correctamente');
    }

    public function store_admin(Request $request)
    {
        $this->validate(
            $request, [
            'brand' => ['required', 'max:40', 'min:2'],
            'model'=> ['required', 'max:40', 'min:2'],
            'vehicleType' => ['required']
        ], [
            'brand.required' => 'Este campo no puede estar vacio',
            'brand.max'      => 'La marca no puede ser mas larga que 40 caracteres',
            'brand.min'      => 'La marca debe tener al menos 2 letras',
            'model.required' => 'Este campo no puede estar vacio',
            'model.max'      => 'El modelo no puede ser mas largo que 40 caracteres',
            'model.min'      => 'El modelo debe tener al menos 2 letras',
            'vehicleType.required' => 'Este campo no puede estar vacio'  
            ]);

        $user = Auth::user();
        $user_id = $user->id;

        $vehicle = new Vehicle;
        $vehicle->admin_id = $user_id;
        $vehicle->brand = strtoupper($request->input('brand'));
        $vehicle->model= strtoupper($request->input('model'));
        $vehicle->vehicle_type =  $request->input('vehicleType');
        $vehicle->save();

        return redirect('/admin/index-vehicles')->with('success', 'Vehiculo registrado correctamente');
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
        $vehicle   = Vehicle::findOrFail($id);
        return  view('admin-modules.Vehicles.admin-vehicle-edit', compact('vehicle', 'id'));
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
            $request, [
            'brand' => ['required', 'max:40', 'min:2'],
            'model'=> ['required', 'max:40', 'min:2'],
            'vehicleType' => ['required']
        ], [
            'brand.required' => 'Este campo no puede estar vacio',
            'brand.max'      => 'La marca no puede ser mas larga que 40 caracteres',
            'brand.min'      => 'La marca debe tener al menos 2 letras',
            'model.required' => 'Este campo no puede estar vacio',
            'model.max'      => 'El modelo no puede ser mas largo que 40 caracteres',
            'model.min'      => 'El modelo debe tener al menos 2 letras',
            'vehicleType.required' => 'Este campo no puede estar vacio'  
            ]);

    }

    public function admin_update(Request $request, $id)
    {
        $this->validate(
            $request, [
            'brand' => ['required', 'max:40', 'min:2'],
            'model'=> ['required', 'max:40', 'min:2'],
            'vehicleType' => ['required']
        ], [
            'brand.required' => 'Este campo no puede estar vacio',
            'brand.max'      => 'La marca no puede ser mas larga que 40 caracteres',
            'brand.min'      => 'La marca debe tener al menos 2 letras',
            'model.required' => 'Este campo no puede estar vacio',
            'model.max'      => 'El modelo no puede ser mas largo que 40 caracteres',
            'model.min'      => 'El modelo debe tener al menos 2 letras',
            'vehicleType.required' => 'Seleccione un elemento de la l'  
            ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->brand = strtoupper($request->input('brand'));
        $vehicle->model= strtoupper($request->input('model'));
        $vehicle->vehicle_type =  $request->input('vehicleType');
        $vehicle->save();

        return redirect('/admin/index-vehicles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicles = Vehicle::findOrFail($id);
        $vehicles->delete();
        return redirect('/admin/index-vehicles');


    }
}
