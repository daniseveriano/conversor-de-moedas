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

        $latest = Http::withHeaders([
            'apikey' => '3AhYSbak48vM6LGnfUFtuD1SjOGew3WU'
        ])->get('https://api.apilayer.com/exchangerates_data/latest', [
            'symbols' => 'brl,usd,cad,eur,gbp,jpy,aud,chf,cny,ars,try',
            'base' => $request->from,
        ]);

        $response->json();

        $event = new Event;

        $event->amount = $response['query']['amount'];
        $event->from = $response['query']['from'];
        $event->to = $response['query']['to'];
        $event->date = $response['date'];
        $event->result = $response['result'];
        $event->latest_brl = $latest['rates']['BRL'];
        $event->latest_usd = $latest['rates']['USD'];
        $event->latest_cad = $latest['rates']['CAD'];
        $event->latest_eur = $latest['rates']['EUR'];
        $event->latest_gbp = $latest['rates']['GBP'];
        $event->latest_jpy = $latest['rates']['JPY'];
        $event->latest_aud = $latest['rates']['AUD'];
        $event->latest_chf = $latest['rates']['CHF'];
        $event->latest_cnf = $latest['rates']['CNY'];
        $event->latest_ars = $latest['rates']['ARS'];
        $event->latest_try = $latest['rates']['TRY'];

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
