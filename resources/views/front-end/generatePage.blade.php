
<h1>
    iftekher mahmud pervez
</h1>

@if ( $menus != null )

{{-- @foreach ( $menus as $menu ) --}}

<li>{{ $menus->title }}</li>
<li>{{ $menus->feature }}</li>
<li>{{ $menus->content }}  </li>
  
{{-- @endforeach --}}

@endif


