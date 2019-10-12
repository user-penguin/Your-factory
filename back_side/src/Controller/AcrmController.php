<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Component\HttpClient\CurlHttpClient;

class AcrmController extends AbstractController
{
    /**
     * @var array $credentials
     */
    private static $credentials = [
        "email" => "kobzev96@gmail.com",
        "api_key" => "438cbc5f-d4b1-11e9-9333-0cc47a6ca50e"
    ];

    private static $host = 'https://geekycats.s20.online';

    /**
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getToken()
    {
        $client = new CurlHttpClient();
        $response = $client->request('POST', self::$host . '/v2api/auth/login', [
            'json' => self::$credentials
        ]);

        $tokenContent = $response->getContent();
        $token = json_decode($tokenContent, true)['token'];
    }

}