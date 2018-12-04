@extends('layouts.main')

@section('content')

    <div class="container jumbotron">
        {{Form::model($input, ['route' => 'user.input.update'])}}
        <div class="form-group">
            {{Form::label('budget', 'Budget:')}}
            {{Form::number('budget')}}
        </div>
        <div class="form-group">
            {{Form::label('zip', 'Zip:')}}
            {{Form::text('zip')}}
        </div>
        <div class="form-group">
            {{Form::label('house_nr', 'Huisnummer:')}}
            {{Form::number('house_nr')}}
        </div>
        <div class="form-group">
            {{Form::label('floor_isolation', 'Floor isolation')}}
            {{Form::checkbox('floor_isolation')}}
        </div>
        <div class="form-group">
            {{Form::label('solar_panels', 'Solar panels')}}
            {{Form::checkbox('solar_panels')}}
        </div>
        <div class="form-group">
            {{Form::label('cavity_wall', 'Cavity wall')}}
            {{Form::checkbox('cavity_wall')}}
        </div>
        <div class="form-group">
            {{Form::label('roof_isolation', 'Roof isolation')}}
            {{Form::checkbox('roof_isolation')}}
        </div>
        <div class="form-group">
            {{Form::label('heat_pump', 'Heat pump')}}
            {{Form::checkbox('heat_pump')}}
        </div>
        <div class="form-group">
            {{Form::label('kettle', 'Kettle')}}
            {{Form::checkbox('kettle')}}
        </div>
        <div class="form-group">
            {{Form::label('double_glass', 'Double glass')}}
            {{Form::checkbox('double_glass')}}
        </div>
        <div class="form-group">
            {{Form::label('floor_isolation', 'Floor isolation')}}
            {{Form::checkbox('floor_isolation')}}
        </div>
        <div class="form-group">
            {{Form::label('ventilation_box', 'Ventilation box')}}
            {{Form::checkbox('ventilation_box')}}
        </div>
        <div class="form-group">
            {{Form::label('solar_water_heater', 'Solar water heater')}}
            {{Form::checkbox('solar_water_heater')}}
        </div>
        <div class="form-group">
            {{Form::submit('Submit')}}
        </div>
        {{Form::close()}}
    </div>

@endsection