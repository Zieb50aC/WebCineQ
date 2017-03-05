@extends('layouts.app')


@section('lateral')
    
        @if (Auth::guest())   
            <a href="{{ url('/login') }}" class="btn btn-default btn-lg btn-block sombraCaja">Login</a>
            <a href="{{ url('/register') }}" class="btn btn-default btn-lg btn-block sombraCaja">Registrate</a>
        @else
             <li class="dropdown sinPunto">
                <a class="btn btn-default btn-lg btn-block dropdown-toggle sombraCaja" data-toggle="dropdown" href="#" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
                <ul class="dropdown-menu sombraCaja" style = "min-width: 100% !important;">
                    <li><a href="#">Action</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </ul>
            </li>
        @endif
        
@endsection