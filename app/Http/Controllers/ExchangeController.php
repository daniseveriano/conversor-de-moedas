<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $data = DB::table('exchanges')->latest()->paginate(8);

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
        $event->from = $response['query']['from'];
        $event->to = $response['query']['to'];
        $event->date = $response['date'];
        $event->result = $response['result'];

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        // return redirect()->back();
        return redirect('/show');
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso');
    }
}
