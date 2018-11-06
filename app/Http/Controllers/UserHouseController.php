<?php

namespace App\Http\Controllers;

use App\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserHouseController extends Controller
{
    public function index()
    {
        $houses = Auth::user()->houses()->with('reports')->orderBy('created_at', 'desc')->get();

        return view('report.index', compact('houses'));
    }

    public function create()
    {
        return view('house.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'residents' => 'required|int',
            'zip' => 'required',
            'house_nr' => 'required',
            'name' => 'required'
        ]);
//        $response = file_get_contents('https://api.backhoom.com/woningscan-consolidated/prod?referral_code=cf6c19320ec80bb2a25e7d4cd6b03067d7e74dd8&postcode='.$request->get('zip').'&nummer='.$request->get('house_nr').$request->get('affix').'&bewoners='.$request->get('residents').'&jaarverbruik_kWh=&jaarverbruik_m3=');
//        $json = json_decode($response, true);

//        $house = Auth::user()->houses()->create([
//            'name' => $request->get('name'),
//            'zip' => $json['lookup']['postcode'],
//            'house_nr' => $json['lookup']['compleet_nummer'],
//            'street' => $json['lookup']['straatnaam'],
//            'city' => $json['lookup']['gemeentenaam'],
//            'coordinates' => str_replace(')', '', str_replace('POINT(', '',$json['lookup']['gis_center']))
//        ]);

        $house = Auth::user()->houses()->create([
            'name' => $request->get('name'),
            'zip' => $request->get('zip'),
            'house_nr' => $request->get('house_nr'),
            'street' => '',
            'city' => '',
            'coordinates' => ''
        ]);

        $report = $house->reports()->create();

        $report->outputs()->create([
            'name' => 'floor_isolation'
        ]);
        $report->outputs()->create([
            'name' => 'solar_panels'
        ]);
        $report->outputs()->create([
            'name' => 'cavity_wall'
        ]);
        $report->outputs()->create([
            'name' => 'roof_isolation'
        ]);
        $report->outputs()->create([
            'name' => 'heat_pump'
        ]);
        $report->outputs()->create([
            'name' => 'kettle'
        ]);
        $report->outputs()->create([
            'name' => 'double_glass'
        ]);
        $report->outputs()->create([
            'name' => 'ventilation_box'
        ]);
        $report->outputs()->create([
            'name' => 'solar_water_heater'
        ]);

//        if($json['woningscan'] & isset($json['woningscan']['result'])){
//            foreach($json['woningscan']['result'] as $index => $output){
//
//                if($index == 'inputs') return;
//
//                $report->outputs()->create([
//                    'name' => $index,
//                    'saving_euro' => $output['besparing_el_euro'] == 'N.v.t.' ? NULL : $output['besparing_el_euro'],
//                    'amount' => $output['aantal'] == 'N.v.t.' ? NULL : $output['aantal'],
//                    'gas' => $output['verbruik_gas_euro'] == 'N.v.t.' ? NULL : $output['verbruik_gas_euro'],
//                    'surface' => $output['beschikbaar_oppervlakte'] == 'N.v.t.' ? NULL : $output['beschikbaar_oppervlakte'],
//                    'usage' => $output['verbruik_el_euro'] == 'N.v.t.' ? NULL : $output['verbruik_el_euro'],
//                    'investment' => $output['investering'] == 'N.v.t.' ? NULL : $output['investering'],
//                    'saving_meter' => $output['besparing_m3'] == 'N.v.t.' ? NULL : $output['besparing_m3'],
//                    'saving_gas' => $output['besparing_gas_euro'] == 'N.v.t.' ? NULL : $output['besparing_gas_euro'],
//                    'payback' => $output['terugverdientijd'] == 'N.v.t.' ? NULL : $output['terugverdientijd'],
//                    'suitability' => $output['geschiktheid'] == 'N.v.t.' ? NULL : $output['geschiktheid'],
//                    'saving_kwh' => $output['besparing_kWh'] == 'N.v.t.' ? NULL : $output['besparing_kWh']
//                ]);
//            }
//        }
        return redirect()->route('reports');
    }
}
