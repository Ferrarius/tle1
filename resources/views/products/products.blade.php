@extends('layouts.main')

@section('content')
    <h1>Alle producten</h1>
    <div class="container">
        <ul>
            @foreach($products as $product)
                <li>{{$product->name}}</li>
            @endforeach
        </ul>
    </div>
@endsection