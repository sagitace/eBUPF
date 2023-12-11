@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://2.bp.blogspot.com/-Xp6D9yzy0nU/UVzwdMGSdxI/AAAAAAAAAD0/CUV6Fm-JISI/s1600/BU+Logo.png" class="logo" alt="Bicol University Logo" width="100px" height="100px">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
