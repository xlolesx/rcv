<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Office;
use App\Estado;
use App\Municipio;
use App\Parroquia;

class OfficesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::all();
        $counter = 0;

        return view('admin-modules.Offices.admin-offices-index', compact('offices', 'counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::all();

        return view('admin-modules.Offices.admin-offices-create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search_municipio(Request $request)
    {
        if ($request->ajax()) {
            $data = Municipio::where('id_estado',  $request->estadoId)->get();

            $output = '';
            $output = '<option value=""> - Seleccionar Municipio - </option>';

            foreach ($data as $row){
                $output .= '<option value="'.$row->id_municipio.'">'.$row->municipio.'</option>';
            }

            return $output;
        }

        
    }

    public function search_parroquia(Request $request)
    {
        if ($request->ajax()) {
            $data = Parroquia::where('id_municipio',  $request->municipioId)->get();

            $output = '';
            $output = '<option value=""> - Seleccionar Parroquia - </option>';

            foreach ($data as $row){
                $output .= '<option value="'.$row->id_parroquia.'">'.$row->parroquia.'</option>';
            }

            return $output;
        } 
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'estado'    => ['required'],
            'municipio' => ['required'],
            'parroquia' => ['required'],
            'address'   => ['required']
        ]);

        $office = new Office;
        $office->id_estado = $request->input('estado');
        $office->id_municipio = $request->input('municipio');
        $office->id_parroquia = $request->input('parroquia');
        $office->office_address = $request->input('address');
        $office->save();

        return redirect('/admin/index-offices')->with('success', 'Oficina registrada correctamente');
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

    public function admin_edit($id)
    {
        $office = Office::findOrFail($id);
        $estados = Estado::all();
        return  view('admin-modules.Offices.admin-office-edit', compact('office', 'id', 'estados'));
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

    public function admin_update(Request $request, $id)
    {
       $office = Office::findOrFail($id);
        $office->id_estado = $request->input('estado');
        $office->id_municipio = $request->input('municipio');
        $office->id_parroquia = $request->input('parroquia');
        $office->office_address = $request->input('address');
        $office->save();

        return redirect('/admin/index-offices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prices = Office::findOrFail($id);
        $prices->delete();
        return redirect('/admin/index-offices');
    }
}
