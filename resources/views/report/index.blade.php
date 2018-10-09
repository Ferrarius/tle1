<div class="container">
    <ul>
        @foreach($raports as $report)
            <li>{{$raport->name}}</li>
        @endforeach
    </ul>
</div>