<?php

namespace App\Http\Controllers;

use App\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInputController extends Controller
{
    public function edit()
    {
        $input = Auth::user()->input;

        return view('input.edit', compact('input'));
    }

    public function update(Request $request)
    {
        //USER CREATE
        $request->merge(['zip' => str_replace(' ', '', $request->get('zip'))]);

        $input = Auth::user()->input ? Auth::user()->input : Auth::user()->input()->create();
        $input->fill(array_only($request->all(), ['zip', 'house_nr', 'budget']));
        $input->save();

        //OUTPUT AND REPORT CREATE
        $response = file_get_contents("https://api.backhoom.com/woningscan-consolidated/prod?referral_code=cf6c19320ec80bb2a25e7d4cd6b03067d7e74dd8&postcode=$input->zip&nummer=$input->house_nr&bewoners=3&jaarverbruik_kWh=&jaarverbruik_m3=");
        $json = json_decode($response, true);

        $report = Auth::user()->reports()->create([
            'name' => 'first Report',
        ]);

        foreach($json['woningscan']['result'] as $index => $output){

            if($index == 'inputs') return;

            $report->outputs()->create([
                'name' => $index,
                'saving_euro' => $output['besparing_el_euro'] == 'N.v.t.' ? NULL : $output['besparing_el_euro'],
                'amount' => $output['aantal'] == 'N.v.t.' ? NULL : $output['aantal'],
                'gas' => $output['verbruik_gas_euro'] == 'N.v.t.' ? NULL : $output['verbruik_gas_euro'],
                'surface' => $output['beschikbaar_oppervlakte'] == 'N.v.t.' ? NULL : $output['beschikbaar_oppervlakte'],
                'usage' => $output['verbruik_el_euro'] == 'N.v.t.' ? NULL : $output['verbruik_el_euro'],
                'investment' => $output['investering'] == 'N.v.t.' ? NULL : $output['investering'],
                'saving_meter' => $output['besparing_m3'] == 'N.v.t.' ? NULL : $output['besparing_m3'],
                'saving_gas' => $output['besparing_gas_euro'] == 'N.v.t.' ? NULL : $output['besparing_gas_euro'],
                'payback' => $output['terugverdientijd'] == 'N.v.t.' ? NULL : $output['terugverdientijd'],
                'suitability' => $output['geschiktheid'] == 'N.v.t.' ? NULL : $output['geschiktheid'],
                'saving_kwh' => $output['besparing_kWh'] == 'N.v.t.' ? NULL : $output['besparing_kWh'],
            ]);
        }

        return redirect()->back()->with(['status' => 'Your inputs has been saved']);
    }
}
