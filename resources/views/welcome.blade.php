@extends('layouts.main')

@section('content')

    <div id="hero-img" class="">
        <div class=" container col-6 offset-3 bg-light card d-flex align-items-center" id="form-home">
            <form class="py-5">
                <div class="form-group d-inline-block mr-3 text-left">
                    <label for="inputZip">Postcode</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="Postcode" required>
                </div>
                <div class="form-group d-inline-block mr-3 text-left">
                    <label for="inputHousenumber">Huisnummer</label>
                    <input type="number" class="form-control" id="inputHousenumber" placeholder="Huisnummer" required>
                </div>
                <div class="form-group d-inline-block mr-3 text-left">
                    <label for="inputAffix">Toevoeging</label>
                    <input type="text" class="form-control" id="inputAffix" placeholder="Toevoeging">
                </div>
                <div class="form-group d-inline-block mr-3 text-left">
                    <label for="inputAmount">Beschikbaar bedrag</label>
                    <input type="number" class="form-control" id="inputAmount" placeholder="Bedrag">
                </div>
                <button type="submit" class="btn btn-primary btn-green mb-1">DOE DE CHECK →</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/multiplestep.js')}}"></script>
@endsection
