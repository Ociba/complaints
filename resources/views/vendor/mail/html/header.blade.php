@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
        <img src="{{ rtrim(config('app.url'), '/') }}/asset/images/logo.png" class="logo" alt="Tulinawe Logo">@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
