@extends('index')

@section('content')

<x-link-form />

{{-- guest link oluşturduysa --}}
@php
if(session()->has('links')){
  $links = session()->get('links');
}
@endphp 
{{-----------------------------}}

@if($links)  
    <hr class="mb-4 mt-4">

    <div class="row g-1">

            @foreach ($links as $link)

                <x-short-link :code="$link['code']" :forward-url="$link['forward_url']"  />
            
            @endforeach

    </div>
@endif
@endsection

