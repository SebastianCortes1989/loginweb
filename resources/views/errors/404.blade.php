@extends('default')

@section('content')

<div class="row" style="margin:10%">
    <div class="col m10 offset-m1">
        <div class="card-panel teal center-align">
        	<h3>ERROR 404</h3>
            <span class="white-text">
                {{ $exception->getMessage() }}
            </span>
        </div>
    </div>
</div>

@endsection