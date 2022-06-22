<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $url = 'http://192.168.56.69:8080/api/wishlist';
        $response = $client->request('GET', $url, ['verify' => false])->getBody()->getContents();
        $wishlists = json_decode($response)->data;
        $wishlists = collect($wishlists);

        $wishlistWish = $wishlists->where('status', 'wish');
        $wishlistBought = $wishlists->where('status', 'bought');
        $wishlistReading = $wishlists->where('status', 'reading');
        $wishlistFinished = $wishlists->where('status', 'finished');
        return view('wishlist.index', compact('wishlistWish', 'wishlistBought', 'wishlistReading', 'wishlistFinished'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();
        $url = 'http://192.168.56.69:8080/api/wishlist';
        $response = $client->request('POST', $url, ['form_params' => $request->all()]);

        return redirect('/wishlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = new Client();
        $url = 'http://192.168.56.69:8080/api/wishlist/' . $id;
        $response = $client->request('PUT', $url, ['form_params' => [
            'status' => $request->status
        ]]);
        return redirect('/wishlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = new Client();
        $url = 'http://192.168.56.69:8080/api/wishlist/' . $id;
        $response = $client->request('DELETE', $url);
        return redirect('/wishlist');
    }


    public function apiIndex() {
        $wishlists = Wishlist::all();
        return response()->json([
            'data' => $wishlists
        ]);
    }

    public function apiStore(Request $request) {
        $wishlist = Wishlist::create($request->all());
        return response()->json([
            'data' => $wishlist
        ]);
    }

    public function apiUpdate(Request $request, Wishlist $wishlist) {
        $wishlist->update([
            'status' => $request->status
        ]);
        return response()->json([
            'data' => $wishlist
        ]);
    }

    public function apiDelete(Wishlist $wishlist) {
        $wishlist->delete();
        return response()->json([
            'data' => 'success'
        ]);
    }
}
