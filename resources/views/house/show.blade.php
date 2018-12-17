@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$house->name}}</h1>

        {{Form::open(['route' => ['report.update', $house, $report]])}}
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
            @foreach($report->outputs as $output)
                <tr>
                    <td>
                        {{Form::checkbox('completed[]', $output->id, $output->completed, !Auth::user()->can('update', $report)? ['disabled']:[])}}
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
            </tbody>
        </table>
        {{Form::submit('Updaten', ['class' => 'btn btn-success'])}}
        {{Form::close()}}
    </div>
@endsection