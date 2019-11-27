<?php

use PHPUnit\Framework\TestCase;
use Fjakkarin\Manuscript\ManuscriptClient;

/**
 * Class ManuscriptClientTest
 */
class ManuscriptClientTest extends TestCase
{

    private $client;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();
        $dotenv = Dotenv\Dotenv::create(__DIR__ . '/../');
        $dotenv->load();
        $this->client = new ManuscriptClient(getenv("LINK"), getenv("TOKEN"));
    }

    /**
     * @test
     */
    public function do_get_all_milestones ()
    {
        $milestones = $this->client->getAllMilestones();
        $this->assertEquals(44, sizeof($milestones));
    }

    public function do_get_all_projects ()
    {
        $projects = $this->client->getAllProjects();
    }
}
