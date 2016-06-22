@extends('layouts.default')

@section('nav')
<nav id="navigation_bar" class="navbar navbar-dark bg-inverse">
<div class="container">
<!-- Brand -->
<a class="navbar-brand" href="#">Logo</a>

<!-- Links -->
<ul class="nav navbar-nav pull-md-right">
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
    {{Auth::user()->name}}
    </a>
    <div class="dropdown-menu" aria-labelledby="Preview">
    <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
    </div>
    </li>
</ul>
</div>
</nav>
@endsection

@section('main')

@endsection

@section('js')
<script type="text/javascript">

</script>
@endsection
