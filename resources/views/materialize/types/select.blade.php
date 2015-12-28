<div class="row">
    <div class="file-field input-field col s12">
        <select>
            <option value="" disabled selected>Choose your option</option>
            @foreach($value as $k => $v)
            <option value = '{{$k}}'>{{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
