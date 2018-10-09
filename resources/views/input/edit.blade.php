@extends('layouts.app')

@section('content')
    <div class="container">
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
            {{Form::label('address', 'Adress:')}}
            {{Form::number('address')}}
        </div>
        {{Form::submit('Submit')}}

        {{Form::close()}}

        <div>
            {{Form::open(['route' => 'user.report.create'])}}
        </div>
    </div>


@endsection