<?php

namespace App\Services;

use GuzzleHttp\Client;

class RequestService
{

    private const ALBUM_GET_INFO_API_URL = 'https://ws.audioscrobbler.com/2.0/?method=album.getinfo';

    private const ARTIST_GET_INFO_API_URL = 'https://ws.audioscrobbler.com/2.0/?method=artist.getinfo';

    private const API_PARAMS = [
        'api_key' => '&api_key=',
        'artist' => '&artist=',
        'album' => '&album=',
        'format' => '&format='
    ];

    public function getAlbumImageUrl(array $input)
    {
        $client = new Client(['verify' => false]);

        $url = null;
        $targetEntity = $input['entity'];
        if ($targetEntity == 'album') {
            $url = self::ALBUM_GET_INFO_API_URL
                . self::API_PARAMS['api_key'] . env('LAST_FM_API_KEY')
                . self::API_PARAMS['artist'] . $input['artist']
                . self::API_PARAMS['album'] . $input['album'];
        } else if ($targetEntity == 'artist') {
            $url = self::ARTIST_GET_INFO_API_URL
                . self::API_PARAMS['api_key'] . env('LAST_FM_API_KEY')
                . self::API_PARAMS['artist'] . $input['artist'];
        }
        $res = $client->get($url . self::API_PARAMS['format'] . 'json');
        $data = json_decode($res->getBody()->getContents(), true);
        return $data[$targetEntity]['image'][1]['#text'];
    }
}
