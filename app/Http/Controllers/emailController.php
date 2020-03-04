<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\email;
use App\country;

class emailController extends Controller
{
    public function index() {
        return view('home');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'country' => 'required',
        ]);

        $email = new email();
        $email->email = $request->email;

        $countries = country::all()
            ->where('name', '=', $request->country);

        if ($countries->count() == 0) {
            $newCountry = new country();
            $newCountry->name = $request->country;
            $newCountry->save();
            $email->country()->associate($newCountry);
        } else {
            $email->country()->associate($countries->first());
        }
        $email->save();
        return view('home')
            ->with('message', 'Record saved');
    }

    public function list(Request $request) {
        $records = email::all();

        $countries = country::has('emails')
            ->get();
        $country = '';

        if ($request->country) {
            $country = $request->country;
            $records = $records
                ->where('country_id', '=', $country);
        }

        return view('list')
            ->with('records', $records)
            ->with('countries', $countries->sortBy('name'))
            ->with('country', $country);
    }
}
