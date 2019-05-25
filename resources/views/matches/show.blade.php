@extends('master')
@section('title', 'View a match')
@section('content')

<div class="container col-md-8 col-md-offset-2">
<div class="well well bs-component"  style="opacity: 0.7;">
<div class="content">
	
<h2> {!! $match->team1 !!} &nbsp <b>{!! $match->goal1 !!} - {!! $match->goal2 !!}</b> &nbsp {!! $match->team2 !!}</h2>
<h3><b>{!! $match->stadium !!} <br></h3>
<h4>{!! $match->match_type !!} match </b> </h4> <h4> Winner: {!! $match->winner !!}</h4>
<h4><b>Match Time: {!! $match->match_date !!} | {!! $match->match_time !!}</b></h4>
		
</div><br>
<a href="{!! action('MatchesController@edit', $match->slug) !!}" class="btn btn-info pull-left">Edit</a>
<form method="post" action="{!! action('MatchesController@delete', $match->slug) !!}" class="pull-left">
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<div>
<button type="submit" class="btn btn-danger">Delete</button>
</div>
</form>
<div class="clearfix"></div>
</div>
</div>
@endsection