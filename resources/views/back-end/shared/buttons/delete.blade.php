
<form action="{{route($routeName.'.destroy',['id'=>$rows->id])}}" method="POST">
    {{ csrf_field() }}
{{ method_field('delete') }}
    <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove {{ $smoduleName }}">
      <i class="material-icons">delete</i>
    </button>

</form>
