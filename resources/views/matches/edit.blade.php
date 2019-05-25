@extends('master')
@section('title', 'edit a match')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" method="post">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <legend>Edit Match</legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Team1:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="team1" placeholder="Team1" name="team1" value="{!! $match->team1 !!}">
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Goal1:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="goal1" placeholder="Goal1" name="goal1" value="{!! $match->goal1 !!}">
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Team2:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="team2" placeholder="Team2" name="team2" value="{!! $match->team2 !!}">
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Score2:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="goal2" placeholder="goal2" name="goal2" value="{!! $match->goal2 !!}">
                            </div>
                        </div>


                        <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Winner:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="winner" placeholder="Winner" name="winner" value="{!! $match->winner !!}">
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Stadium:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="stadium" placeholder="Stadium" name="stadium" value="{!! $match->stadium !!}">
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Stadium ID:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="stadium_id" placeholder="Stadium ID" name="stadium_id" value="{!! $match->stadium_id !!}">
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Match Type:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="match_type" placeholder="Match Type" name="match_type" value="{!! $match->match_type !!}">
                            </div>
                        </div>

                         <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Match Date:</label>
                            <div class="col-lg-10">
                                <input type="date" class="form-control" id="match_date" placeholder="Date of the Match" name="match_date" value="{!! $match->match_date !!}">
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Match Time:</label>
                            <div class="col-lg-10">
                                <input type="time" class="form-control" id="match_time" placeholder="Time of the Match" name="match_time" value="{!! $match->match_time !!}">
                            </div>
                        </div>

                  
                    <div class="form-group">
                    <label>
                    <input type="checkbox" name="status" {!! $match->status?"":"checked"!!}> Close this match?
                    </label>
                    </div>

                    <div class="form-group">
<div class="col-lg-10 col-lg-offset-2">
<button class="btn btn-default">Cancel</button>
<button type="submit" class="btn btn-primary">Update</button>
</div>
</div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection