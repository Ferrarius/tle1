@extends('layouts.main')

@section('content')
        <div class="py-5 container">
            <div class="jumbotron text-lg-center">
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
                        <label for="inputAddition">Toevoeging</label>
                        <input type="text" class="form-control" id="inputAddition" placeholder="Toevoeging">
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
