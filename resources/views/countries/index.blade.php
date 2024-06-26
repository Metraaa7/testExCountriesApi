<div class="container">
    <h1>Countries</h1>
    <ul>
        @foreach ($countries as $country)
            <li><a href="{{ route('countries.show', ['code' => $country->code]) }}">{{ $country->name }}</a> ({{ $country->code }})</li>
        @endforeach
    </ul>
</div>