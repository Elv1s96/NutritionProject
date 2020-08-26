<?php

namespace App\Http\Controllers;


use App\Models\Fitness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $isExists = Fitness::where('user_id', Auth::user()->id)->first();

        return view('home',compact('isExists'));
    }
    public function chartData()
    {
        $arr = [];
        for($i=1;$i<=30;$i++)
        {
            $arr[] = rand(1500,3000);
        }
        return [
            'labels' => [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30],
            'datasets'   => [
                [
                    'label' => 'Потребление каллорий',
                    'backgroundColor' => '#F26202',
                    'data' => $arr,
                ]
            ]
        ];
    }
    public function newEvent(Request $request)
    {
        $params = $request->all();
        $message = Auth::user()->name.': '.$params['text'];
           event(new \App\Events\NewEvent($message));
    }
    public function redisExample()
    {
        return view('redis.redisExample');
    }
    public function echoChat()
    {
        return view('echoChat');
    }
    public function echoChatSendMessage(Request $request)
    {
        $params = $request->all();
        $message = Auth::user()->name.': '.$params['text'];
        event(new \App\Events\Message($message));
    }
}
