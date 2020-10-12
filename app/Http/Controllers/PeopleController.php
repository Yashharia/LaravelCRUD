<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sessionID =  $request->user()->id;

        $peoples = People::latest()->where('created_by', $sessionID)->get();
        return view('dashboard', compact("peoples"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sessionID =  $request->user()->id;
        return view('create', compact('sessionID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile_number' => 'required',
            'email' => 'required',
            'description' => 'required',
            'created_by' => 'required',
        ]);

        People::create($request->all());
        return redirect()->route('peoples.index')
            ->with('success', 'Entry created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show(People $people)
    {
        return view('show', compact('people'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function edit(People $people, Request $request)
    {
        $sessionID =  $request->user()->id;
        return view('edit', compact('people', 'sessionID'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $people)
    {
        $request->validate([
            'name' => 'required',
            'mobile_number' => 'required',
            'email' => 'required',
            'description' => 'required',
            'created_by' => 'required',

        ]);

        $people->update($request->all());
        return redirect()->route('peoples.index')
            ->with('sucess', 'Entry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $people)
    {
        $people->delete();
        return redirect()->route('peoples.index')
            ->with('sucess', 'Entry deleted successfully');
    }
}
