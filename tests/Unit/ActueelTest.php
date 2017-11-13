<?php

namespace Jvleeuwen\Cspreporter\Tests\Unit;

use Orchestra\Testbench\TestCase;
use Jvleeuwen\Cspreporter\Cspreporter;

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
        $this->feed = new Cspreporter();
        $this->file = 'http://cspreporter.nl/rss/actueel/';
    }

    /** @test */
    public function it_can_load_rss()
    {
        $this->assertInternalType('object', $this->feed->file($this->file));
    }

    /** @test */
    public function it_can_get_actual_test_xml_from_tests_dir()
    {
        $this->assertCount(1, $this->feed->file($this->file));
    }

    /** @test */
    public function it_can_parse_rss()
    {
        $this->assertInternalType('array', $this->feed->ParseRss($this->feed->file($this->file)));
    }

    /** @test */
    public function it_can_run_the_full_cycle()
    {
        $this->assertInternalType('array', $this->feed->uri($this->file));
    }

    /** @test */
    public function it_can_not_parse_uri_feed()
    {
        $this->assertSame('invalid XML', $this->feed->uri('i dont exist'));
    }
}
