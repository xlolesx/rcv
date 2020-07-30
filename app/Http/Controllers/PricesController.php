<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Price;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $prices = Price::all();

        return view('user-modules.Prices.prices-index', compact('prices'));
    }

    public function index_admin()
    {
        $prices = Price::all();
        $counter = 0;

        return view('admin-modules.Prices.admin-prices-index', compact('prices', 'counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin-modules.Prices.admin-prices-create');
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
            'description'      => ['required','min:1'],
            'damage_things'    => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'premium1'         => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'damage_people'    => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'premium2'         => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'disability'       => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'premium3'         => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'legal_assistance' => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'premium4'         => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'death'            => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'premium5'         => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'medical_expenses' => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'premium6'         => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'crane'            => ['max:25', 'regex:/[^A-Za-z-\s]+$/'],

        ]);

        $price = new Price;
        // $string_test = $request->input('damage_things');
        // $str2 = str_replace(",", "", $string_test);
        $all = $request->all();

        $pricesarr = [];
        foreach ($all as $item) {
            $replaced = str_replace(',', '', $item);
            
            array_push($pricesarr, $replaced);
        }

        $price->damage_things    = $pricesarr[2];
        $price->premium1         = $pricesarr[3];
        $price->damage_people    = $pricesarr[4];
        $price->premium2         = $pricesarr[5];
        $price->disability       = $pricesarr[6];
        $price->premium3         = $pricesarr[7];
        $price->legal_assistance = $pricesarr[8];
        $price->premium4         = $pricesarr[9];
        $price->death            = $pricesarr[10];
        $price->premium5         = $pricesarr[11];
        $price->medical_expenses = $pricesarr[12];
        $price->premium6         = $pricesarr[13];
        $price->crane            = $pricesarr[14];
        $price->description      = $request->input('description');

        $sum = $pricesarr[3] + $pricesarr[5] + $pricesarr[7] + $pricesarr[9] + $pricesarr[11] + $pricesarr[13];
        $sum2 = $pricesarr[2] + $pricesarr[3] + $pricesarr[4] + $pricesarr[5] + $pricesarr[6] + $pricesarr[7] + $pricesarr[8] + $pricesarr[9] + $pricesarr[10] + $pricesarr[11] + $pricesarr[12] + $pricesarr[13] + $pricesarr[14];
        $price->total_premium = $sum;
        $price->total_all = $sum2;
        $price->save();

        return redirect('/admin/index-prices');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $price = Price::find($id);

        return view('user-modules.Prices.price-show', compact('price'));
    }


    public function show_admin($id)
    {
        $price = Price::find($id);

        return view('admin-modules.Prices.admin-price-show', compact('price'));
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
        $price = Price::findOrFail($id);
        return  view('admin-modules.Prices.admin-price-edit', compact('price', 'id'));
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
        $this->validate($request, [
            'description'      => ['required','min:1'],
            'damage_things'    => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'premium1'         => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'damage_people'    => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'premium2'         => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'disability'       => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'premium3'         => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'legal_assistance' => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'premium4'         => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'death'            => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'premium5'         => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'medical_expenses' => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'premium6'         => ['required', 'max:25', 'min:1', 'regex:/[^A-Za-z-\s]+$/'],
            'crane'            => ['max:25', 'regex:/[^A-Za-z-\s]+$/'],

        ]);

        $price = Price::findOrFail($id);
        $price->damage_things = $request->input('damage_things');
        $price->premium1 = $request->input('premium1');
        $price->damage_people = $request->input('damage_people');
        $price->premium2 = $request->input('premium2');
        $price->disability = $request->input('disability');
        $price->premium3 = $request->input('premium3');
        $price->legal_assistance = $request->input('legal_assistance');
        $price->premium4 = $request->input('premium4');
        $price->death = $request->input('death');
        $price->premium5 = $request->input('premium5');
        $price->medical_expenses = $request->input('medical_expenses');
        $price->premium6 = $request->input('premium6');
        $price->crane = $request->input('crane');
        $price->description = $request->input('description');

        $sum = $request->input('premium1') + $request->input('premium2') + $request->input('premium3') + $request->input('premium4') + $request->input('premium5') + $request->input('premium6');
        $sum2 = $request->input('damage_things') + $request->input('damage_people') + $request->input('disability') + $request->input('legal_assistance') + $request->input('death') + $request->input('medical_expenses') + $request->input('premium1') + $request->input('premium2') + $request->input('premium3') + $request->input('premium4') + $request->input('premium5') + $request->input('premium6');
        $price->total_premium = $sum;
        $price->total_all = $sum2;
        $price->save();

        return redirect('/admin/index-prices');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prices = Price::findOrFail($id);
        $prices->delete();
        return redirect('/admin/index-prices');
    }
}
