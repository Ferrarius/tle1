@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$report->name}}</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Finish</th>
                <th scope="col">Name</th>
                <th scope="col">Savings in Euros</th>
                <th scope="col">Amount</th>
                <th scope="col">Investment</th>
                <th scope="col">payback</th>
                <th scope="col">Gas savings in Euros</th>
                <th scope="col">Savings in Kwhs</th>
            </tr>
            </thead>
            <tbody>
            {{Form::open(['route' => ['report.update', $house, $report]])}}
            @foreach($report->outputs as $output)
                <tr>
                    <td>
                        @if($output->completed)
                            {{Form::checkbox('completed[]', null, ['checked' => 'checked'])}}
                        @else
                            {{Form::checkbox('completed[]')}}
                        @endif
                    </td>
                    <td>{{$output->name}}</td>
                    <td>{{$output->saving_euro}}</td>
                    <td>{{$output->amount}}</td>
                    <td>{{$output->investment}}</td>
                    <td>{{$output->payback}} Years</td>
                    <td>{{$output->saving_gas}}</td>
                    <td>{{$output->saving_kwh}}</td>
                </tr>
            @endforeach
            {{Form::close()}}
            </tbody>
        </table>
    </div>
@endsection