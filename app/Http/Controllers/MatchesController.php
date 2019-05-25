<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MatchFormRequest;
use App\Match;

class MatchesController extends Controller
{
    //
    public function create()
	{
		return view('matches.create');
	}

	public function store(MatchFormRequest $request)
	{
		$slug = uniqid();
		$match = new Match(array('team1' => $request->get('team1'),'goal1' => $request->get('goal1'),'team2' => $request->get('team2'),'goal2' => $request->get('goal2'),'winner' => $request->get('winner'),'stadium' => $request->get('stadium'),'stadium_id' => $request->get('stadium_id'),'match_type' => $request->get('match_type'),'match_date' => $request->get('match_date'),'match_time' => $request->get('match_time'),'slug' => $slug));
		$match->save();
		return redirect('/matchcreate')->with('status', 'Your match has been created! Its unique id is: '.$slug);
	}

    public function match()
	{
		$matches = Match::all();
		return view('matches.match', compact('matches'));
	}

	public function show($slug)
	{
		$match = Match::whereSlug($slug)->firstOrFail();
		return view('matches.show', compact('match'));
	}

	public function edit($slug)
	{
		$match = Match::whereSlug($slug)->firstOrFail();
		return view('matches.edit', compact('match'));
	}

	public function update($slug, MatchFormRequest $request)
	{
		$match = Match::whereSlug($slug)->firstOrFail();
		$match->team1 = $request->get('team1');
		$match->goal1 = $request->get('goal1');
		$match->team2 = $request->get('team2');
		$match->goal2 = $request->get('goal2');
		$match->winner = $request->get('winner');
		$match->stadium = $request->get('stadium');
		$match->stadium_id = $request->get('stadium_id');
		$match->match_date = $request->get('match_date');
		$match->match_time = $request->get('match_time');
		$match->match_type = $request->get('match_type');
		if($request->get('status') != null) {
			$match->status = 0;
		} 
		else {
		$match->status = 1;
		}
	$match->save();
	return redirect(action('MatchesController@edit', $match->slug))->with('status', 'The match '.$slug.' has been updated!');
}

	public function delete($slug)
	{
		$match = Match::whereSlug($slug)->firstOrFail();
		$match->delete();
	return redirect('/match')->with('status', 'The match '.$slug.' has been deleted!');
}

	public function filter()
    {
        $groups = Match::where('match_type', 'Group')->get();
        $knockouts = Match::where('match_type', 'Knockout')->get();
        $semifinals = Match::where('match_type', 'Semifinal')->get();
        $playoffs = Match::where('match_type', 'Play-off for third place')->get();
        $finals = Match::where('match_type', 'Final')->get();
        $quarters = Match::where('match_type', 'Quarter-final')->get();
        return view('matches.filter', compact('groups', 'knockouts', 'semifinals', 'playoffs', 'finals', 'quarters'));
    }

}
