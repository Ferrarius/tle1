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

        dd($response);
        $house = House::create($request->all());

        return $house;
    }
}
