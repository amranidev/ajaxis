<table class="bordered highlight">
    @foreach ($input as $key)
    <tr><td><h5><b>{{$key['key']}}<b></h5></td>
    <td><h6><i>{{$key['value']}}</i></h6></td></tr>
    @endforeach
</table>
