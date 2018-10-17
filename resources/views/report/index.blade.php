@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reports as $report)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$report->name}}</td>
                    <td>{{$report->created_at->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{route('user.report.show', compact('report'))}}" class="btn btn-success float-left">Show</a>
                        {{Form::open(['route' => ['user.report.delete', $report], 'class' => 'float-left'])}}
                            {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                        {{Form::close()}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection