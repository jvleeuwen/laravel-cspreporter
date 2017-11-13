<?php

namespace Jvleeuwen\Cspreporter\Tests\Unit;

use Mockery;
use Orchestra\Testbench\TestCase;
use Jvleeuwen\Cspreporter\Cspreporter;
use Illuminate\Support\ServiceProvider;
use Jvleeuwen\Cspreporter\CspreporterServiceProvider;

class CspReporterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    protected $application_mock;
    protected $service_provider;

    public function setUp()
    {
        $this->feed = new Cspreporter();
        $this->file = 'http://cspreporter.nl/rss/actueel/';
        $this->serviceProvider = new CspreporterServiceProvider($this->application_mock);
        parent::setUp();
    }

    protected function setUpMocks()
    {
        $this->application_mock = Mockery::mock(Application::class);
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

    /** @test */
    public function it_can_be_constructed()
    {
        $this->assertInstanceOf(ServiceProvider::class, $this->serviceProvider);
    }
}
