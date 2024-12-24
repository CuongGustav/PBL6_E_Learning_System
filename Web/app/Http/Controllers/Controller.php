<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    function getHTTP(){
        $response = Http::get('https://datasendandreceiverserver.onrender.com/get_text');
        $data = $response->json();
        // dd($data[0]['title']);
        return response()->json([
            'status' => 'success',
            'originalText' =>  $data['text'],
            'translatedText' => 'Xin chào Thế giớiddddwwwwwd!'
        ]);
    }

    function getFindHTTP(){
        $response = Http::post('https://jsonplaceholder.typicode.com/posts',
        [
            "title" => "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
            "id" => 1
        ]);
        $data = $response->json();
        dd($data);
    }

    function deleteHTTP(){
        $response = Http::delete('https://jsonplaceholder.typicode.com/posts/1');
        $data = $response->json();
        dd($data);
    }
}
