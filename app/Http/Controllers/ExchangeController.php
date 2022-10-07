<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Event;

class ExchangeController extends Controller
{
    public function index()
    {
        $data = Event::all();

        $request = Http::withHeaders([
            'apikey' => 'Cxli09ooNUak5UE4TWc4PLogiW1rR3aB'
        ])->get('https://api.apilayer.com/exchangerates_data/convert', [
            'to' => $data[count($data) - 1]['to'],
            'from' => $data[count($data) - 1]['from'],
            'amount' => $data[count($data) - 1]['amount'],
        ]);

        $response = $request->json();

        return view('api', ['response' => $response, 'data' => $data]);
    }

    public function create()
    {
        $data = Event::all();

        return view('create', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $event = new Event;

        $event->amount = $request->amount;
        $event->from = $request->from;
        $event->to = $request->to;

        $event->save();

        return redirect('/historic');
    }
}
