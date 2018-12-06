@extends('layouts.main')

@section('content')

    <div id="hero-img" class="">
        <div class=" container col-6 offset-3 bg-light card d-flex align-items-center" id="form-home">

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/multiplestep.js')}}"></script>
    <script type="text/babel" src="{{asset('js/HouseForm.js')}}"></script>
@endsection
