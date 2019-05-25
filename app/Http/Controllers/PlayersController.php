<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PlayerFormRequest;
use App\Player;

class PlayersController extends Controller
{
    //
    public function create()
	{
		return view('players.create');
	}

	public function store(PlayerFormRequest $request)
	{
		//return $request->all();
		$slug = uniqid();
		$player = new Player(array('name' => $request->get('name'),'age' => $request->get('age'),'height' => $request->get('height'),'team' => $request->get('team'),'goal' => $request->get('goal'),'assist' => $request->get('assist'),'position' => $request->get('position'),'team_id' => $request->get('team_id'),'slug' => $slug));
		$player->save();
		return redirect('/playercreate')->with('status', 'Your player has been created! Its unique id is: '.$slug);
}

    public function player()
	{
		$players = Player::all();
		return view('players.player', compact('players'));
	}

	public function show($slug)
	{
		$player = Player::whereSlug($slug)->firstOrFail();
		return view('players.show', compact('player'));
	}

	public function edit($slug)
	{
		$player = Player::whereSlug($slug)->firstOrFail();
		return view('players.edit', compact('player'));
	}

	public function update($slug, PlayerFormRequest $request)
	{
		$player = Player::whereSlug($slug)->firstOrFail();
		$player->name = $request->get('name');
		$player->age = $request->get('age');
		$player->height = $request->get('height');
		$player->team = $request->get('team');
		$player->goal = $request->get('goal');
		$player->position = $request->get('position');
		$player->assist = $request->get('assist');
		if($request->get('status') != null) {
			$player->status = 0;
		} 
		else {
		$player->status = 1;
		}
	$player->save();
	return redirect(action('PlayersController@edit', $player->slug))->with('status', 'The player '.$slug.' has been updated!');
}

	public function delete($slug)
	{
		$player = Player::whereSlug($slug)->firstOrFail();
		$player->delete();
	return redirect('/player')->with('status', 'The player '.$slug.' has been deleted!');
}
}
