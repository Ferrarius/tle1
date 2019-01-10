@extends('layouts.main')

@section('content')
    <div class="static-background blurred" style="background-image: url({{asset('images/report-background.jpg')}});"></div>
    <div class="container flex-1">
        <h1>{{$report->name}}</h1>

        {{Form::open(['route' => ['report.update', $house, $report]])}}
        <div>
            <h2 class="text-light">Producten</h2>
            <div class="outputs">
                @foreach($report->outputs as $output)
                    <div class="output card">
                        <div class="d-flex justify-content-between btn" data-toggle="collapse" data-target="#collapse{{$output->name}}">
                            <h3>{{ucfirst($output->name)}}</h3>
                            <div>
                                @auth
                                {{Form::checkbox('completed[]', $output->name, $output->completed, ['class' => 'checkbox'])}}
                                @endauth
                            </div>
                        </div>
                        <div class="collapse" id="collapse{{$output->name}}">
                            <strong class="col-12">Bedrijven die het product aanbieden</strong>
                            <div class="products">
                                @foreach($output->products as $product)
                                    <div class="product">
                                        <div class="btn d-flex justify-content-between" data-toggle="collapse" data-target="#collapse{{$output->name.$loop->index}}">
                                            <h4>{{$product->company_name}}</h4>
                                            <span>Meer info</span>
                                        </div>
                                        <div class="collapse products" id="collapse{{$output->name.$loop->index}}">
                                            <div class="d-flex justify-content-between">
                                                <strong>{{$product->name}}</strong>
                                                <span>Prijs: {{$product->price}}</span>
                                                <a href="{{$product->link}}" target="_blank" class="btn btn-success">Buy!</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @if($report->projects)
        <div>
            <h2 class="text-light">Initiatieven</h2>
            <div class="outputs">
                @foreach($report->projects as $projects)
                    <div class="output card">
                        <div class="d-flex justify-content-between">
                            <h3>{{ucfirst($project->name)}}</h3>
                            <div>
                                @auth
                                {{Form::checkbox('completed[]', null, $output->completed, !Auth::user()->can('update', $report)? ['disabled']:[])}}
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        @can('update', $report)
        <div class="text-right">
            {{Form::submit('Updaten', ['class' => 'btn btn-success'])}}
        </div>

        {{Form::close()}}
        @endcan
    </div>
@endsection

@section('scripts')
    <script>
        window.addEventListener('load', function(){
            $('.checkbox').on('click', function(e){
                e.stopPropagation();
            });
        })
    </script>
@endsection
