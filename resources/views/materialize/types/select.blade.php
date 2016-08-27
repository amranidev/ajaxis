<div class="row">
    <div class="file-field input-field col s12">
        <label for="{{$name}}">{{$label}}</label>
        <select id = "{{$name}}" name = "{{$name}}">
            <option value="" disabled selected>Choose your option</option>
            @if($value)
            @foreach($value as $v)
            <option value = '{{$v}}'>{{$v}}</option>
            @endforeach
            @endif
        </select>
    </div>
</div>
