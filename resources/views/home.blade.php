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
<div class="container">
    @foreach($teachers as $teacher)
        <div class="card card-block">
        <div class="row">
        <div class="col-md-12">
        <div class="col-md-2">
            <img src="{{$teacher->photo}}">
        </div>
        <div class="col-md-4">
        {{$teacher->surname}} {{$teacher->name}} Ηλικία: {{$teacher->age}}
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-2">

        </div>
        </div>
        </div>


        </div>
    @endforeach
</div>
@endsection

@section('js')
<script type="text/javascript">
    $('.card').click(function(){

    });
</script>
@endsection
