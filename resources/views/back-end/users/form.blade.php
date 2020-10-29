{{ csrf_field() }}
<div class="row">

    @php
        $input='name';
    @endphp
    <div class="col-md-3">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Username</label>

      <input id="{{$input}}" type="text" name="{{$input}}" value="{{isset($row)?$row->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror" >
          <span class="invalid-feedback" role="alert">
          @error($input)
            <strong>{{ $message }}</strong>
          </span>
          @enderror

    </div>
  </div>
  @php
  $input='email';
@endphp
  <div class="col-md-4">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Email address</label>
      <input id="{{$input}}" type="email" name="{{$input}}" value="{{isset($row)?$row->{$input} :''}}" class="form-control @error('email') is-invalid @enderror">
      @error($input)
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
@php
$input='password';
@endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">password</label>
        <input id="{{$input}}" type="password" name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
        @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    </div>

</div>


