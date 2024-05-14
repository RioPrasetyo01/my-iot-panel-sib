<?php

namespace App\Http\Controllers;

use App\Models\Led;
use Illuminate\Http\Request;

class LedController extends Controller
{
    function index(){
        $leds = Led::orderBy('name','ASC') -> get();
        $data['leds'] = $leds;

        return view('pages.led' , $data);
    }

    function store(Request $request){
        $validated = $request->validate([
            'name' => ['required','max:255','min:3'],
            'pin' => ['required','numeric'],
        ]);
        $led = Led::create($validated);

        return redirect()
            ->route('led.index')
            ->with('success','Data berhasil ditambahkan');
    }
}
