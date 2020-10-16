<?php

namespace Fjakkarin\Manuscript;

use Fjakkarin\Manuscript\Model\Filter;
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
    public function __construct(String $url = "https://apisandbox.manuscript.com/", String $token = null)
    {
        $this->token = $token;
        $this->client = new Client([
            'base_uri' => $url,
            'timeout' => 2.0,
            'headers' => [
                'content-type' => 'application/json'
            ]
        ]);
    }

    /**
     * @return array
     */
    public function getAllProjects()
    {
        $response = $this->makeAPICall("api/listProjects");

        if ($response->getStatusCode() === 200) {
            $col = new Collection(json_decode($response->getBody()->getContents(), true)["data"]["projects"]);

            $col->transform(function ($item) {
                return new Projects($item);
            });

            return $col->all();
        }
    }

    /**
     * @return array
     */
    public function getAllMilestones()
    {
        $response = $this->makeAPICall("api/listFixFors");

        if ($response->getStatusCode() === 200) {
            $col = new Collection(json_decode($response->getBody()->getContents(), true)["data"]["fixfors"]);
            //dd($col);
            $col->transform(function ($item) {
                return new Milestone($item);
            });

            return $col->all();
        }
    }

    /**
     * @return array
     */
    public function getAllFilters()
    {
        $response = $this->makeAPICall('api/listFilters');

        if ($response->getStatusCode() === 200) {
            $col = new Collection(json_decode($response->getBody()->getContents(), true)["data"]["filters"]);

            $col->transform(function ($item) {
                if (gettype($item) !== "string") {
                    return new Filter($item);
                }
            });

            return $col->filter(function ($item) {
                if(isset($item)) {
                    return $item;
                }
            })->all();

        }
    }

    /**
     * @param string $url
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function makeAPICall(string $url)
    {
        return $response = $this->client->post($url, [
            'json' => [
                'token' => $this->token
            ]
        ]);
    }
}