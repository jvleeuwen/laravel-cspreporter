<?php

namespace Jvleeuwen\Cspreporter\Tests\Unit;

use PHPUnit\Framework\TestCase;
// use Orchestra\Testbench\TestCase;
use Jvleeuwen\Cspreporter\CspreporterService as cspreporter;

class ActueelTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->cspreporter = new cspreporter();
        $this->file = 'http://cspreporter.nl/rss/actueel/';
    }

    /** @test */
    public function it_can_load_rss()
    {
        // $this->cspreporter = new cspreporter();
        $this->assertInternalType('array', $this->cspreporter->uri($this->file));
    }

    /** @test */
    public function it_can_get_actual_test_xml_from_tests_dir()
    {
        $this->assertCount(1, $this->cspreporter->file($this->file));
    }

    /** @test */
    public function it_can_parse_rss()
    {
        $this->assertInternalType('array', $this->cspreporter->ParseRss($this->cspreporter->file($this->file)));
    }

    /** @test */
    public function it_can_run_the_full_cycle()
    {
        $this->assertInternalType('array', $this->cspreporter->uri($this->file));
    }

    /** @test */
    public function it_can_not_parse_uri_feed()
    {
        $this->assertSame('invalid XML', $this->cspreporter->uri('i dont exist'));
    }

    // public function testUpdateOrInsertRssItemInToDatabase()
    // {
    //  $this->markTestIncomplete('This test has not been implemented yet.');
    // }

    // public function testGetRssItemFromDatabase()
    // {
    //  $this->markTestIncomplete('This test has not been implemented yet.');
    // }

    // /** @test */
    // public function it_can_parse_channel_values()
    // {
    //     $this->assertSame('CSP Reporter (0)', (string)$this->xml->channel->title);
    //     $this->assertSame('http://www.cspreporter.nl/', (string)$this->xml->channel->link);
    //     $this->assertSame('Overzicht van actueel meldingen binnen het netwerk van RoutIT', (string)$this->xml->channel->description);
    //     $this->assertSame('nl-nl', (string)$this->xml->channel->language);
    //     $this->assertSame('Wed, 13 Feb 2013 22:12:48 GMT', (string)$this->xml->channel->pubDate);
    //     $this->assertSame('Fri, 19 Feb 2013 22:12:48 GMT', (string)$this->xml->channel->lastBuildDate);
    //     $this->assertSame('E-heroes App Feeder', (string)$this->xml->channel->generator);
    //     $this->assertSame('support@routit.nl', (string)$this->xml->channel->managingEditor);
    //  $this->assertSame('info@routit.nl', (string)$this->xml->channel->webMaster);
    //     $this->assertSame(10, (int)$this->xml->channel->ttl);
    // }
}
