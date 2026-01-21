@extends('layout')
@section('content')


@if (count($listings) == 0)

<p>No listing Found</p>
@endif

@foreach ($listings as $listing)
<h2>Title:
    <a href="/listings/{{ $listing['id'] }}">
        {{ $listing['title'] }}
    </a>

</h2>
<p>Tags: {{ $listing['tags'] }}</p>
<p>Email: {{ $listing['email'] }}</p>
<p>Company: {{ $listing['company'] }}</p>
<p>Location: {{ $listing['location'] }}</p>
<p>{{ $listing['description'] }}</p>
@endforeach
@endsection