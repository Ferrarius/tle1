@extends('layouts.main')

@section('content')

    <div id="hero-img" class="flex-1 align-items-center d-flex justify-content-center flex-wrap">
        <div class="row col-lg-7 col-md-9 col-sm-12 bg-light card" id="homeFormContainer">
            <form id="form-home" class="py-5 col-12">

            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/babel" src="{{asset('js/HouseForm.js')}}"></script>
@endsection
