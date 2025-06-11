@props([
    'url',
    'color' => 'primary',
    'align' => 'center',
])

<table border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td>
<a href="{{ $url }}" class="button button-{{ $color }} " target="_blank" rel="noopener">{!! $slot !!}</a>
</td>
</tr>
</table>
