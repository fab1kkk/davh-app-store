@if (auth()->check())
<p>logged</p>
@else
<p>not logged in</p>
@endif