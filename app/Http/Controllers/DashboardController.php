<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mixtape;
use Spotify;

class DashboardController extends Controller
{
    // Search track on Spotify & show search result
    public function search(Request $request)
    {
        $query = $request->input('query');
        $track = Spotify::searchTracks($query)->get();
        $track_title = $track['tracks']['items'][0]['name'];
        $artist = $track['tracks']['items'][0]['artists'][0]['name'];
        $image_url = $track['tracks']['items'][0]['album']['images'][0]['url'];
        $track_uri = $track['tracks']['items'][0]['uri'];

        return view('search', ['track_title' => $track_title, 'artist' => $artist, 'image_url' => $image_url, 'track_uri' => $track_uri]);
    }

    // Get random track to display suggestion
    public function showRandom()
    {
        // Get Spotify playlist
        $playlist = Spotify::playlist('37i9dQZF1DWYey22ryYM8U')->get();
        $track_id = rand(0,50);
        $track = $playlist['tracks']['items'][$track_id];
        $track_title = $track['track']['name'];
        $artist = $track['track']['artists'][0]['name'];
        $image_url = $track['track']['album']['images'][0]['url'];
        $track_uri = $track['track']['uri'];
        
        return view('dashboard', ['track_title' => $track_title, 'artist' => $artist, 'image_url' => $image_url, 'track_uri' => $track_uri]);
    } 

    // Add track to database
    public function storeTrack(Request $request)
    {
        $mixtape = new Mixtape;
        $mixtape->user_id = auth()->user()->id;
        $mixtape->track = $request->input('track_title');
        $mixtape->artist = $request->input('artist');
        $mixtape->image_url = $request->input('image_url');
        $mixtape->track_uri = $request->input('track_uri');
        $mixtape->notes = "-";
        $mixtape->soft_delete = 0;
        $mixtape->save();
     
        return $this->showRandom();
    }

}