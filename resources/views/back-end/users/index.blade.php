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

@component('back-end.shared.table',[
    'pageTitle'=>$pageTitle,
    'pageDes'=>$pageDes
])

@slot('addButton')
<div class="col-4 text-right">
    <a href="{{route($routeName.'.create')}}" class="btn btn-white btn-round">Add {{$smoduleName}}</a>
  </div>
@endslot




@endcomponent



    <div class="table-responsive">
      <table class="table">
        <thead class=" text-primary">
            <th>
                ID
            </th>
            <th>
                Name
            </th>

            <th>
                Email
            </th>
            <th class="text-right">
                Control
            </th>
        </thead>
    <tbody>
  @foreach($row as $rows)
<tr>
<td>
{{ $rows->id }}
</td>
<td>
{{ $rows->name }}
</td>
<td>
{{ $rows->email }}
</td>
<td class="td-actions text-right">
@include('back-end.shared.buttons.edit')
@include('back-end.shared.buttons.delete')
</td>
</tr>
@endforeach
        </tbody>
      </table>
   {{-- {{ $rows->links() }} --}}
    </div>
  </div>
</div>
</div>







@endsection

{{--  @push to push this code in @stack position  --}}
{{--  @push('js')
    <script>
        alert('Hello');
    </script>
@endpush  --}}
