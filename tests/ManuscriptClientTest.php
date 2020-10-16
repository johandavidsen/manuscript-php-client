<?php

use PHPUnit\Framework\TestCase;
use Fjakkarin\Manuscript\ManuscriptClient;

/**
 * Class ManuscriptClientTest
 */
class ManuscriptClientTest extends TestCase
{

    /**
     * @var ManuscriptClient
     */
    private $client;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();
        $dotenv = Dotenv\Dotenv::create(__DIR__ . '/../');
        $dotenv->load();
        $this->client = new ManuscriptClient(getenv("MANUSCRIPT_LINK"), getenv("MANUSCRIPT_TOKEN"));
    }

    /**
     * @test
     */
    public function do_get_all_milestones()
    {
        $milestones = $this->client->getAllMilestones();
        $this->assertEquals(43, sizeof($milestones));
    }

    /**
     * @test
     */
    public function do_get_all_projects()
    {
        $projects = $this->client->getAllProjects();
        $this->assertEquals(43, sizeof($projects));
    }

    /**
     * @test
     */
    public function do_get_all_filters()
    {
        $filters = $this->client->getAllFilters();
        $this->assertEquals(10, sizeof($filters));
    }

}
