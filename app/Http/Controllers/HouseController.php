<?php

namespace App\Http\Controllers;

use App\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'zip' => 'required',
            'house_nr' => 'required',
            'affix' => 'sometimes'
        ]);

        $request->residents = 1;

        $response = file_get_contents('https://api.backhoom.com/woningscan-consolidated/prod?referral_code=cf6c19320ec80bb2a25e7d4cd6b03067d7e74dd8&postcode='.$request->get('zip').'&nummer='.$request->get('house_nr').$request->get('affix').'&bewoners='.$request->get('residents').'&jaarverbruik_kWh=&jaarverbruik_m3=');
        $json = json_decode($response, true);
        $house = null;

        if(isset($json['lookup'])){
            $house = House::create([
                'name' => 'Home sweet home',
                'zip' => $json['lookup']['postcode'],
                'house_nr' => $json['lookup']['compleet_nummer'],
                'street' => $json['lookup']['straatnaam'],
                'city' => $json['lookup']['gemeentenaam'],
                'coordinates' => str_replace(')', '', str_replace('POINT(', '',$json['lookup']['gis_center']))
            ]);
        }

        $outputs = [];

        if(isset($json['woningscan'])){
            foreach($json['woningscan']['result'] as $index => $output){

                if($index == 'inputs') return;

                $outputs[] = [
                    'name' => $index,
                    'saving_euro' => $output['besparing_el_euro'],
                    'amount' => $output['aantal'],
                    'gas' => $output['verbruik_gas_euro'],
                    'surface' => $output['beschikbaar_oppervlakte'],
                    'usage' => $output['verbruik_el_euro'],
                    'investment' => $output['investering'],
                    'saving_meter' => $output['besparing_m3'],
                    'saving_gas' => $output['besparing_gas_euro'],
                    'payback' => $output['terugverdientijd'],
                    'suitability' => $output['geschiktheid'],
                    'saving_kwh' => $output['besparing_kWh'],
                ];

            }
        }

        $ret = [];
        $ret->house = $house;
        $ret->outputs = $outputs;
        return $ret;

        dd($response);
        $house = House::create($request->all());

        return $house;
    }
}
