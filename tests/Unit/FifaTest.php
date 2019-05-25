<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Stadium;
use App\Player;
use App\Match;
use App\Team;

use Illuminate\Foundation\Testing\RefreshDatabase;

class FifaTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testCountStadium()
	{
    	$this->assertEquals(12, Stadium::count());
    }

    public function testFirstMatch()
    {
    	$match = Match::first();
   		$this->assertEquals($match['match_type'], $match->match_type);
	}

	public function testTeamGoal()
    {
        $team = Team::find(4);
   		$this->assertEquals(2, $team->goals);
    }

    public function testShowAllMatch()
    {
    	$match = Match::all();
        $response = $this->get('/match');
        $response->assertStatus(200);
    }

    public function testShowAPlayer()
    {
    	$player = Player::all();
        $response = $this->get('/p5b66d1930cf51', ['id'=>3]);
        $response->assertStatus(200);
    }

    public function testShowATeam()
    {
    	$Team = Team::all();
        $response = $this->get('/t5b66b5fcdcc98', ['id'=>1]);
        $response->assertStatus(200);
    }

    public function testPlayerTeam()
    {
        $player = Player::find(5);
   		$this->assertNotEquals('Brazil', $player->team);
    }
 
    public function testPlayerName()
    {
        $player = new Player(['name'=>'Lionel Messi']);
	    $this->assertStringStartsWith('Lio', $player->name);
    }

    public function testStadiumCapacity()
    {
        $stadium = new Stadium(['capacity'=>'76000']);
      $this->assertLessThanOrEqual('76000', $stadium->capacity);
    }
    
}
