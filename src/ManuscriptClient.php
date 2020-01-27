<?php

namespace Fjakkarin\Manuscript;

use Fjakkarin\Manuscript\Model\Milestone;
use Fjakkarin\Manuscript\Model\Projects;
use GuzzleHttp\Client;
use Tightenco\Collect\Support\Collection;

/**
 * Class ManuscriptClient
 * @package Fjakkarin\ManuscriptClient
 */
class ManuscriptClient
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var String
     */
    private $token;

    /**
     * ManuscriptClient constructor.
     * @param String $url
     * @param String $token
     */
    public function __construct (String $url = 'https://apisandbox.manuscript.com/', String $token = '')
    {
        $this->token = $token;
        $this->client = new Client([
            'base_uri' => $url,
            'timeout'  => 2.0,
            'headers' => [
                'content-type' => 'application/json'
            ]
        ]);
    }

    /**
     *
     */
    public function getAllProjects ()
    {
        $respone = $this->client->post('api/listProjects', [
            'json' => [
                'token' => $this->token
            ]
        ]);

        if ($respone->getStatusCode() === 200)
        {
            $col = new Collection(json_decode($respone->getBody()->getContents(), true)["data"]["projects"]);

            $col->transform(function ($item) {
                return new Projects($item);
            });

            return $col->all();
        }
    }

    /**
     * @return array
     */
    public function getAllMilestones ()
    {
        $response = $this->client->post('api/listFixFors', [
            'json' => [
                'token' => $this->token
            ]
        ]);

        if ($response->getStatusCode() === 200)
        {
            $col = new Collection(json_decode($response->getBody()->getContents(), true)["data"]["fixfors"]);

            $col->transform(function ($item) {
                return new Milestone($item);
            });

            return $col->all();
        }
    }
}