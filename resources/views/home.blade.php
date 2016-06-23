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
<div class="row">
    <div class="row">
    <?php $loop_counter=0; ?>
    @foreach($teachers as $teacher)
        <div class="col-xl-4">
            <div id="{{$teacher->id}}" class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <img src="{{$teacher->photo}}">
                            </div>
                            <div class="col-md-6">
                                {{$teacher->surname}} {{$teacher->name}} <br> Ηλικία: {{$teacher->age}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- List Group -->
                <ul id="list_{{$teacher->id}}" class="list-group list-group-flush lessons-container min-hei">
                    <li class="list-group-item">
                        {{$lessons[$teacher->id]->name}}
                    </li>
                </ul>
            </div>
        </div>
    @if(fmod($loop_counter,3)==2)
        </div>
    @endif
    @if(fmod($loop_counter,3)==2 && $loop_counter!=sizeof($teachers))
        <div class="row">
    @endif
    <?php $loop_counter++; ?>
    @endforeach
</div>
@endsection

@section('js')
<script type="text/javascript">
    function open_drawer(id) {
        $('#list_'.concat(id)).removeClass('min-hei');
        $('#list_'.concat(id)).addClass('max-hei');
    }

    function close_drawer(id) {
        $('#list_'.concat(id)).removeClass('max-hei');
        $('#list_'.concat(id)).addClass('min-hei');
    }

    function drawer_is_open(id) {
        if($('#list_'.concat(id)).hasClass('max-hei')){
            return true;
        }
        return false;
    }

    $('.card').click(function(){

        var id = $(this).attr('id');
        if(drawer_is_open(id)){
            close_drawer(id);
        }else{
            open_drawer(id);
        }

    });
</script>
@endsection
