{{--  الملف ده معمول ليه انكلود في صفحات الكرييت و الابديت
    اللي هو بدايةالفورم و الانبوت اللي جواها

    --}}

{{ csrf_field() }}
<div class="row">

    @php
    $input='name';
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video name</label>

            <input id="{{$input}}" type="text" name="{{$input}}" value="{{isset($row)?$row->{$input} : ''}}"
                class="form-control @error($input) is-invalid @enderror">
            <span class="invalid-feedback" role="alert">
                @error($input)
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
    </div>
    @php
    $input='image';
    @endphp
    <div class="col-md-6">
        <div>
            <label class="bmd-label-floating">Video image</label>

            <input id="{{$input}}" type="file" name="{{$input}}" value="{{isset($row)?$row->{$input} : ''}}"
                class="form-control @error($input) is-invalid @enderror">
            <span class="invalid-feedback" role="alert">
                @error($input)
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
    </div>
    @php
    $input='meta_keywords';
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta keywords</label>
            <input id="{{$input}}" type="text" name="{{$input}}" value="{{isset($row)?$row->{$input} :''}}"
                class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php
    $input='youtube';
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">youtube link</label>
            <input id="{{$input}}" type="url" name="{{$input}}" value="{{isset($row)?$row->{$input} :''}}"
                class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @php
    $input='published';
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Status</label>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
                <option value="1" {{isset($row) && $row->{$input} ==1 ? 'selected' :''}}>Published</option>
                <option value="0" {{isset($row) && $row->{$input} ==0 ? 'selected' :''}}>Hidden</option>
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php
    $input='cat_id';
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">categories</label>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
                @foreach ($categories as $cat)
                <option value="{{$cat->id}}" {{isset($row) && $row->{$input} ==$cat->id ? 'selected' :''}}>
                    {{$cat->name}}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @php
    $input='meta_des';
    @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Description</label>
            <textarea name="{{$input}}" class="form-control @error($input) is-invalid @enderror" cols="20"
                rows="5">{{isset($row)?$row->{$input} :''}}</textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @php
    $input='des';
    @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Description</label>
            <textarea name="{{$input}}" class="form-control @error($input) is-invalid @enderror" cols="20"
                rows="5">{{isset($row)?$row->{$input} :''}}</textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php
    $input="skills[]";
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Skills</label>
            <select name="{{$input}}" multiple="multiple" class="form-control @error($input) is-invalid @enderror"
                style="height:auto">
                @foreach ($skills as $skill)
                <option value="{{$skill->id}}" {{in_array($skill->id,$selectedSkills) ? 'selected' : ''}}  >{{$skill->name}}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @php
    $input="tags[]";
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Tags</label>
            <select name="{{$input}}" multiple="multiple" class="form-control @error($input) is-invalid @enderror"
                style="height:auto">
                @foreach ($tags as $tag)
                <option value="{{$tag->id}}" {{in_array($tag->id,$selectedTags)? 'selected' :'' }} >{{$tag->name}}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


</div>
