<?php

namespace Jvleeuwen\Cspreporter\tests;

use Mockery;
use cspreporter;
use Orchestra\Testbench\TestCase;
use Jvleeuwen\Cspreporter\CspreporterFacade;
use Jvleeuwen\Cspreporter\CspreporterServiceProvider;

class ActualTest extends TestCase
{
    /**
     * @var Mockery\Mock
     */
    protected $application_mock;

    /**
     * @var  ServiceProvider
     */
    protected $service_provider;

    protected function getPackageProviders($app)
    {
        return [CspreporterServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'cspreporter' => CspreporterFacade::class,
        ];
    }

    /**
     * Setup the test environment.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->setUpMocks();
        $this->service_provider = new CspreporterServiceProvider($this->application_mock);
        $this->file = 'http://cspreporter.nl/rss/actueel/';
    }

    protected function setUpMocks()
    {
        $this->application_mock = Mockery::mock(Application::class);
    }

    /**
     * @test
     */
    public function it_registers_the_service()
    {
        $concrete = $this->app->make('Jvleeuwen\Cspreporter\CspreporterFacade');
        $this->assertInstanceOf('Jvleeuwen\Cspreporter\CspreporterFacade', $concrete);
    }

    /**
     * @test
     */
    public function it_provides_cspreporter()
    {
        $this->assertInternalType('array', $this->service_provider->provides());
        $this->assertSame('cspreporter', $this->service_provider->provides()[0]);
    }

    /**
     * @test
     */
    public function it_can_reached_the_test_function()
    {
        $this->assertSame(cspreporter::test(), 'u have reached the test function');
    }

    /**
     * *@test
     */
    public function it_can_load_rss()
    {
        $this->assertInternalType('array', cspreporter::uri($this->file));
    }

    /**
     * *@test
     */
    public function it_can_get_actual_test_xml_from_tests_dir()
    {
        $this->assertCount(1, cspreporter::file($this->file));
    }

    /**
     * *@test
     */
    public function it_can_parse_rss()
    {
        $this->assertInternalType('array', cspreporter::ParseRss(cspreporter::file($this->file)));
    }

    /**
     * *@test
     */
    public function it_can_run_the_full_cycle()
    {
        $this->assertInternalType('array', cspreporter::uri($this->file));
    }

    /**
     * *@test
     */
    public function it_can_not_parse_uri_feed()
    {
        $this->assertSame('invalid XML', cspreporter::uri('i dont exist'));
    }
}
