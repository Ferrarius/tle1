@extends('layouts.app')

@section('content')
    <div class="container">
        <table>
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($houses as $house)
                        <tr>
                            <td>{{$house->name}}</td>
                            <td>{{$house->created_at->format('d/m/Y')}}</td>
                            <td>
                                <a href="{{route('house.show', $house)}}" class="btn btn-success float-left">Show</a>
                                {{--{{Form::open(['route' => ['report.delete', $house, $report],'method' => 'delete', 'class' => 'float-left'])}}--}}
                                {{--{{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}--}}
                                {{--{{Form::close()}}--}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
@endsection