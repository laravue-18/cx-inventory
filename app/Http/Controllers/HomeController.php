<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public  function index(){
        $response = Http::get('https://www.blacktradelines.com/cfc/mobile/mobile.cfc?wsdl&method=GetRadioChannels&ChannelIDs=215&locale=US&os=android&network=blacktradelines&status=1&format=1');
        $channel = $response->json()[0];

        $response = Http::get('https://www.blacktradelines.com/cfc/mobile/mobile.cfc?wsdl&method=GetEpisodes&ChannelID=215&locale=us&os=android&network=blacktradelines&format=1&status=1&Published=1&limit=100');
        $episodes = $response->json();

        return view('home.index')->with(compact('episodes', 'channel'));
    }

    public  function podcast(){
        $response = Http::get('https://www.blacktradelines.com/cfc/mobile/mobile.cfc?wsdl&method=GetRadioChannels&ChannelIDs=215&locale=US&os=android&network=blacktradelines&status=1&format=1');
        $channel = $response->json()[0];

        $response = Http::get('https://www.blacktradelines.com/cfc/mobile/mobile.cfc?wsdl&method=GetEpisodes&ChannelID=215&locale=us&os=android&network=blacktradelines&format=1&status=1&Published=1&limit=100');
        $episodes = $response->json();

        return view('home.podcast.index')->with(compact('channel', 'episodes'));
    }

    public function showPodcast($id){
        $response = Http::get('https://www.blacktradelines.com/cfc/mobile/mobile.cfc?wsdl&method=GetRecordings&ChannelID=215&EpisodeID=' . $id . '&locale=us&os=android&network=blacktradelines&format=1&status=1&limit=100');
        $episode = $response->json()[0];

        return view('home.podcast.show')->with(compact('episode'));
    }

    public  function store(){
        $products = Product::all();
        return view('home.products.index')->with(compact('products'));
    }

    public function showProduct($id){
        $product = Product::find($id);
        return view('home.products.show')->with(compact('product'));
    }

    public  function blog(){
        $posts = Post::all();

        return view('home.posts.index')->with(compact('posts'));
    }

    public function showPage($page){
        try{
            return view('home.pages.' . $page);
        }catch(\Exception $e){
            abort(404);
        }
    }

}
