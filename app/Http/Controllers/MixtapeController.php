<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Mixtape;
use Spotify;

class MixtapeController extends Controller
{
    public function index()
    {
        // Get mixtapes & number of entries
        $mixtapes = DB::table('mixtapes')->where([['user_id', '=', auth()->user()->id], ['soft_delete', '=', 0]])->get();
        $amount = $mixtapes->count();

        if ($amount == 0) {

            $empty = true;
            return view('mixtape', ['empty' => $empty]);

        } else {

            $empty = false;
            return view('mixtape', ['empty' => $empty, 'mixtapes' => $mixtapes]);

        }
    }

    public function show(Request $request)
    {
        $id = trim(parse_url($request->fullUrl())['query'], '=');
        $mixtape = DB::table('mixtapes')->get()->where('id', $id);

        $mixtape_track = DB::table('mixtapes')->get()->where('id', $id)->pluck('track');
        $mixtape_artist = DB::table('mixtapes')->get()->where('id', $id)->pluck('artist');
        $mixtape_image = DB::table('mixtapes')->get()->where('id', $id)->pluck('image_url');
        $mixtape_uri = DB::table('mixtapes')->get()->where('id', $id)->pluck('track_uri');
        $mixtape_notes = DB::table('mixtapes')->get()->where('id', $id)->pluck('notes');

        $track = $mixtape_track[0];
        $artist = $mixtape_artist[0];
        $image_url = $mixtape_image[0];
        $track_uri = $mixtape_uri[0];
        $notes = $mixtape_notes[0];

        return view('show', ['track' => $track, 'artist' => $artist, 'image_url' => $image_url, 'track_uri' => $track_uri, 'notes' => $notes]);
    } 

    public function edit(Request $request)
    {
        $id = trim(parse_url($request->fullUrl())['query'], '=');
        $mixtape = DB::table('mixtapes')->where('id', $id)->get();

        $track = $mixtape[0]->track;
        $artist = $mixtape[0]->artist;
        $notes = $mixtape[0]->notes;

        return view('edit', ['track' => $track, 'artist' => $artist, 'notes' => $notes]);
    } 

    public function storeNotes(Request $request)
    {
        $track = $request->input('track');
        $artist = $request->input('artist');
        $notes = $request->notes;

        DB::table('mixtapes')->where('track', $track)->where('artist', $artist)->update(['notes' => $notes]);
        
        return view('home');
    }

    public function softDelete(Request $request)
    {
        $id = trim(parse_url($request->fullUrl())['query'], '=');

        DB::table('mixtapes')->where('id', $id)->update(['soft_delete'=>1]);

        return view('home');
    }

}