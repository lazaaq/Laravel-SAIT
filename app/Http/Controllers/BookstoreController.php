<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class BookstoreController extends Controller
{
    public function index() {
        return view('bookstore.index');
    }

    public function new() {
        $client = new Client();
        $url = 'https://api.itbook.store/1.0/new';
        $response = $client->request('GET', $url)->getBody()->getContents();
        $response = json_decode($response);
        return view('bookstore.new', [
            'books' => $response
        ]);
    }

    public function search(Request $request) {
        if ($request->has('query') && $request->has('page')) {
            $client = new Client();
            $url = 'https://api.itbook.store/1.0/search/' . $request->input('query') . '/' . $request->input('page');
            $response = $client->request('GET', $url)->getBody()->getContents();
            $response = json_decode($response);
            return view('bookstore.search', [
                'books' => $response,
                'query' => $request->input('query'),
                'page' => $request->input('page')
            ]);
        } else {
            return view('bookstore.search', [
                'books' => null,
                'query' => null,
                'page' => null
            ]);
        }
    }

    public function books(Request $request) {
        if($request->isbn13) {
            $client = new Client();
            $url = 'https://api.itbook.store/1.0/books/' . $request->isbn13;
            $response = $client->request('GET', $url)->getBody()->getContents();
            $response = json_decode($response);
            return view('bookstore.books', [
                'books' => $response
            ]);
        } else {
            return view('bookstore.books', [
                'books' => null
            ]);
        }
    }
}
