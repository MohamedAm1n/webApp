@extends('back-end.layout.app')
@section('title')
    Home Page
@endsection
{{--  @push to push this code in @stack position  --}}
{{--  @push('css')
    <style>
        a {
            color: red  !important ;
        }
    </style>
@endpush  --}}

@section('content')
    @component('back-end.layout.header',['nav_title'=>'home page'])
 {{--
    another way
    @slot('nav_title')
home page
@endslot
    --}}
    @endcomponent

@endsection

{{--  @push to push this code in @stack position  --}}
{{--  @push('js')
    <script>
        alert('Hello');
    </script>
@endpush  --}}
