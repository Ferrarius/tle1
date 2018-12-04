@extends('layouts.app')

@section('content')
    <h1>Enter products</h1>


    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route("product.store")}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Product naam</label>
                        <input class="form-control" type="text" placeholder="Naam" name="name">
                    </div>

                    <div class="form-group">
                        <label>Product naam</label>
                        <input class="form-control" type="text" placeholder="Naam">
                    </div>

                    <div class="form-group">
                        <label>Product naam</label>
                        <input class="form-control" type="text" placeholder="Naam">
                    </div>

                    <div class="form-group">
                        <label>Product naam</label>
                        <input class="form-control" type="text" placeholder="Naam">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection