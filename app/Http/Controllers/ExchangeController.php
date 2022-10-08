<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Event;

class ExchangeController extends Controller
{
    public function show()
    {
        $data = Event::all();

        return view('show', ['data' => $data]);
    }

    public function create()
    {
        $data = Event::all();

        return view('create', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $response = Http::withHeaders([
            'apikey' => '3AhYSbak48vM6LGnfUFtuD1SjOGew3WU'
        ])->get('https://api.apilayer.com/exchangerates_data/convert', [
            'to' => $request->to,
            'from' => $request->from,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);

        $response->json();

        $event = new Event;

        $event->amount = $response['query']['amount'];
        $event->from = $response['query']['amount'];
        $event->to = $response['query']['to'];
        $event->date = $response['date'];
        $event->result = $response['result'];

        $event->save();

        return redirect('/show');
    }
}
