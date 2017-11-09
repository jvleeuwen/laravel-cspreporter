<?php

namespace Jvleeuwen\Cspreporter\Tests\Unit;

use Orchestra\Testbench\TestCase;
use Jvleeuwen\Cspreporter\Cspreporter;
// use Illuminate\Foundation\Testing\RefreshDatabase;

class ActueelTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    // public function setUp()
    // {
    //     parent::setUp();
    //     // $this->feed = Cspreporter::file();
    // }

    public function testGetRSS()
    {
        // Cspreporter::file('Tests/actueel.xml');
        $feed = new Cspreporter();
        $this->assertSame('blaat', $feed->test());
    	// $this->markTestIncomplete('This test has not been implemented yet.');
    }

    // public function testParseRssItemFields()
    // {
    // 	$this->markTestIncomplete('This test has not been implemented yet.');
    // }

    // public function testUpdateOrInsertRssItemInToDatabase()
    // {
    // 	$this->markTestIncomplete('This test has not been implemented yet.');
    // }

    // public function testGetRssItemFromDatabase()
    // {
    // 	$this->markTestIncomplete('This test has not been implemented yet.');
    // }
}
