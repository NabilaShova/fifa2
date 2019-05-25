@extends('master')
@section('title', 'View a player')
@section('content')

<div class="container col-md-8 col-md-offset-2">
<div class="well well bs-component" style="opacity: 0.7;">
<div class="content">
<h2 style="font-weight: bold;"> <b>{!! $player->name !!} </b></h2>

<h3><b>{!! $player->team !!} </b></h3>	
<h4>Position: {!! $player->position !!} </h4>
<h4> Age: {!! $player->age !!} | Height: {!! $player->height !!}(cm) </h4>
<h4> Goals: {!! $player->goal !!} | Assist: {!! $player->assist !!} </h4>
</div><br>
<a href="{!! action('PlayersController@edit', $player->slug) !!}" class="btn btn-info pull-left">Edit</a>
<form method="post" action="{!! action('PlayersController@delete', $player->slug) !!}" class="pull-left">
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<div>
<button type="submit" class="btn btn-danger">Delete</button>
</div>
</form>
<div class="clearfix"></div>
</div>
</div>
@endsection