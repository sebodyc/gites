<?php


namespace App\Service;


use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client=$client;
    }

    public function getApi():array {
        try {
            $response = $this->client->request(
                'GET',
                'http://hp-api.herokuapp.com/api/characters'
            );
        } catch (TransportExceptionInterface $e) {
        }

        return $response->toArray();


    }
}
