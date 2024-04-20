<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'BOWI')
<img src="{{asset('images/bowi-logo.png')}}" class="logo" alt="BOWI Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
