{{ csrf_field() }}
<div class="row">

    @php
        $input='name';
    @endphp
    <div class="col-md-3">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Skills Name</label>

      <input id="{{$input}}" type="text" name="{{$input}}" value="{{isset($row)?$row->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror" >
          <span class="invalid-feedback" role="alert">
          @error($input)
            <strong>{{ $message }}</strong>
          </span>
          @enderror

    </div>
  </div>

</div>


