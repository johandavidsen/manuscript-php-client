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
        if (getenv('CI') !== true) {
            $dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');
            $dotenv->load();
        }
        $this->client = new ManuscriptClient(getenv("MANUSCRIPT_LINK"), getenv("MANUSCRIPT_TOKEN"));
    }

    /**
     * @test
     */
    public function do_get_all_milestones()
    {
        $milestones = $this->client->getAllMilestones();
        $this->assertIsArray($milestones);
    }

    /**
     * @test
     */
    public function do_get_all_projects()
    {
        $projects = $this->client->getAllProjects();
        $this->assertIsArray($projects);
    }

    /**
     * @test
     */
    public function do_get_all_filters()
    {
        $filters = $this->client->getAllFilters();
        $this->assertIsArray($filters);
    }

}
