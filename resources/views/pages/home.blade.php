@extends('layouts.app')

@section('content')

    <div class="container">
        {{Form::open(['route' => 'user.house.store'])}}
        <div class="form-group">
            {{Form::label('budget', 'Budget:')}}
            {{Form::number('budget', null, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('name', 'Naam')}}
            {{Form::text('name', null, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('zip', 'Postcode:')}}
            {{Form::text('zip', null, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('house_nr', 'Huisnummer:')}}
            {{Form::number('house_nr', null, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('affix', 'Toevoeging:')}}
            {{Form::number('affix', null, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('residents', 'Bewoners:')}}
            {{Form::number('residents', null, ['class' => 'form-control'])}}
        </div>
        <div class="form-group text-right">
            {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
        </div>
        {{Form::close()}}
    </div>

@endsection