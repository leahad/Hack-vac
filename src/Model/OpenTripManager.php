<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class OpenTripManager
{
    public function getMap(string $type, string $long, string $lat)
    {
        $client = HttpClient::create();

        $response = $client->request('GET', 'https://api.opentripmap.com/0.1/en/places/radius?radius=20000&lon='
            . $long . '&lat=' . $lat . '&kinds=' . $type
            . '&rate=2&format=json&apikey=5ae2e3f221c38a28845f05b64e82eaa83607c83cb15f25f6cc0d9004');
        $response->getStatusCode();
        $type = $response->getHeaders()['content-type'][0];
        $content = $response->getContent();
            // get the response in JSON format
            $content = $response->toArray();
            // convert the response (here in JSON) to an PHP array
        return $content;
    }
}
