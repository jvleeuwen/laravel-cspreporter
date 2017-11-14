<?php

namespace Jvleeuwen\Cspreporter\Tests\Unit;

use PHPUnit\Framework\TestCase;
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
}
