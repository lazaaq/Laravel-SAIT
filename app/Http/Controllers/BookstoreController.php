<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class BookstoreController extends Controller
{
    public function index() {

    }

    public function new() {
        $client = new Client();
        $url = 'https://api.itbook.store/1.0/new';
        $response = $client->request('GET', $url)->getBody()->getContents();
        return response()->json([
            'response' => json_decode($response)
        ]);
    }

    public function search($query, $page) {
        $client = new Client();
        $url = 'https://api.itbook.store/1.0/search/' . $query . '/' . $page;
        $response = $client->request('GET', $url)->getBody()->getContents();
        return response()->json([
            'response' => json_decode($response)
        ]);
    }

    public function books($isbn13) {
        $client = new Client();
        $url = 'https://api.itbook.store/1.0/books/' . $isbn13;
        $response = $client->request('GET', $url)->getBody()->getContents();
        return response()->json([
            'response' => json_decode($response)
        ]);
    }
}
