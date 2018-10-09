@extends('layouts.app')

@section('content')
    <div class="container">
        <ul>
            @foreach($reports as $report)
                <li>{{$report->name}}</li>
            @endforeach
        </ul>
    </div>
@endsection