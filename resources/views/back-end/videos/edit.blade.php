@extends('back-end.layout.app')


    @section('title')
      {{ $pageTitle }}
    @endsection

@section('content')
    @component('back-end.layout.header')
        @slot('nav_title')
            {{ $pageTitle }}
        @endslot
    @endcomponent


@component('back-end.shared.edit',['pageTitle'=>$pageTitle,
'pageDes'=>$pageDes])


    <form action="{{ route($routeName.'.update',['id'=>$row->id]) }}" method="POST" enctype="multipart/form-data">
        {{ method_field('PUT') }}
@include('back-end.'.$folderName.'.form')



</div>
<button type="submit" class="btn btn-primary pull-right">update {{$moduleName}}</button>
<div class="clearfix"></div>

    </form>
@slot('youtube')
@php
    $url=getYoutubeId($row->youtube);
@endphp
@if ($url)
<iframe width="250" src="https://www.youtube.com/embed/{{ $url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

@endif
<img src="{{ url('upload/'.$row->image) }}" width="250px">
@endslot
@endcomponent
@include('back-end.comments.index')
@endsection
