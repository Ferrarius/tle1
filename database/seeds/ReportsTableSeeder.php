<?php

use App\Report;
use App\User;
use Illuminate\Database\Seeder;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = file_get_contents('https://api.backhoom.com/woningscan-consolidated/prod?referral_code=cf6c19320ec80bb2a25e7d4cd6b03067d7e74dd8&postcode=3065AH&nummer=220&bewoners=3&jaarverbruik_kWh=&jaarverbruik_m3=');
        $json = json_decode($response, true);

        $user = User::find(1);

        $house = $user->houses()->create([
            'name' => 'Home sweet home',
            'zip' => $json['lookup']['postcode'],
            'house_nr' => $json['lookup']['compleet_nummer'],
            'street' => $json['lookup']['straatnaam'],
            'city' => $json['lookup']['gemeentenaam'],
            'coordinates' => str_replace(')', '', str_replace('POINT(', '',$json['lookup']['gis_center']))
        ]);

        $report = $house->reports()->create();
        if($json['woningscan'] & isset($json['woningscan']['result'])){
            foreach($json['woningscan']['result'] as $index => $output){

                if($index == 'inputs') return;

                $report->outputs()->create([
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
                ]);
            }
        }

    }
}
