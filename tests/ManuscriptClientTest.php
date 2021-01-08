<?php

use PHPUnit\Framework\TestCase;
use Dotenv\Dotenv;
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
        if (file_exists(__DIR__ . '/../.env')) {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
            $dotenv->load();
        }

        $this->client = new ManuscriptClient($_ENV["MANUSCRIPT_LINK"], $_ENV["MANUSCRIPT_TOKEN"]);
    }

    /**
     * @test
     * @covers \Fjakkarin\Manuscript\ManuscriptClient::getAllMilestones
     */
    public function do_get_all_milestones()
    {
        $milestones = $this->client->getAllMilestones();
        $this->assertIsArray($milestones);
    }

    /**
     * @test
     * @covers \Fjakkarin\Manuscript\ManuscriptClient::getAllProjects
     */
    public function do_get_all_projects()
    {
        $projects = $this->client->getAllProjects();
        $this->assertIsArray($projects);
    }

    /**
     * @test
     * @covers \Fjakkarin\Manuscript\ManuscriptClient::getAllFilters
     */
    public function do_get_all_filters()
    {
        $filters = $this->client->getAllFilters();
        $this->assertIsArray($filters);
    }

}
