<?php

namespace App\Http\Controllers;

use App\Report;
use App\House;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show(Report $report)
    {
        $house = $report->house;
        $firstReport = $house->reports()->with('outputs')->first();
        $report->load('outputs');
        $nameArray = $report->outputs->pluck('name')->toArray();
        foreach($firstReport->outputs as $r) {
            $r->completed = 0;
            if(!in_array($r->name, $nameArray)) {
                $r->completed = 1;
                $report->outputs[] = $r;
            }
        }

        $report->outputs = $report->outputs->sortBy('name');

        return view('report.show', compact('house','report'));
    }

    public function store(Request $request)
    {
      if(isset($request->house['id'])){
        $house = House::find($request->data->house->id);
      }else{
        $house = House::create([
          'name' => 'Home sweet home',
          'zip' => $request['house']['postcode'],
          'house_nr' => $request['house']['compleet_nummer'],
          'street' => $request['house']['straatnaam'],
          'city' => $request['house']['gemeentenaam'],
          'coordinates' => str_replace(')', '', str_replace('POINT(', '', $request['house']['gis_center']))
          ]);
      }
      $report = $house->reports()->create();
      foreach($request->outputs as $index => $output){

        $report->create([
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
