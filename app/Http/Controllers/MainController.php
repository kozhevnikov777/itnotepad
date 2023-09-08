<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function home() {
        return view('home');
    }

    public function about() {
        return view('about');
    }

    public function records() {
        $notes = new ContactModel();
        return view('records', ['notes' => $notes->all()]);
    }

    public function records_check(Request $request) {
        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
            'record_name' => 'required|min:4|max:100',
            'record_text' => 'required|min:4|max:500'
        ]);

        $record = new ContactModel();
        $record->email = $request->input('email');
        $record->record_name = $request->input('record_name');
        $record->record_text = $request->input('record_text');

        $record->save();

        return redirect()->route('records');
    }
}
