<label class="control-label">{{$label}}</label>
<select class="form-control" name = '{{$name}}'>
	@if($value)
    @foreach ($value as $v)
    <option value =  "{{$v}}">{{$v}}</option>
    @endforeach
    @endif
</select>
