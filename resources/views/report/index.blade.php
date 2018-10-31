@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($houses as $house)
            <div class="d-flex align-items-baseline">
                <h2>{{$house->name}} </h2><span>-</span><h5> {{$house->zip}} {{$house->city}}, {{$house->street}} {{$house->house_nr}}</h5>
            </div>

            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($house->reports as $report)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$report->created_at->format('d/m/Y')}}</td>
                        <td>
                            <a href="{{route('report.show', ['house' => $house, 'report' => $report])}}" class="btn btn-success float-left">Show</a>
                            {{Form::open(['route' => ['report.delete', $house, $report],'method' => 'delete', 'class' => 'float-left'])}}
                                {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                            {{Form::close()}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
@endsection