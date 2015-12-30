<label class="control-label">{{$label}}</label>
<select class="form-control">
	@if($value)
    @foreach ($value as $k => $v)
    <option value =  "{{$k}}">{{$v}}</option>
    @endforeach
    @endif
</select>
