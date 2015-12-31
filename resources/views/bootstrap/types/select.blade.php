<label class="control-label">{{$label}}</label>
<select class="form-control" name = '{{$name}}'>
	@if($value)
    @foreach ($value as $k => $v)
    <option value =  "{{$k}}">{{$v}}</option>
    @endforeach
    @endif
</select>
