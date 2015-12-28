<table class = "table table-bordered table-hover">
    @foreach ($input as $value)
    <tr><td><h3><b>{{$value['key']}}</b></h3></td>
    <td><h4><i>{{$value['value']}}</i></h4></td></tr>
    @endforeach
</table>
