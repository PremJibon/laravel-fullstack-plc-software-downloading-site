<?php

namespace App\Http\Controllers;

use App\Models\Emailserver;
use Illuminate\Http\Request;

class EmailserverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emailservers = Emailserver::paginate(8);
        return view('backend.emailservers.index', compact('emailservers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.emailservers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50|min:1',
            'MAIL_HOST' => 'required|string|max:50|min:1',
            'MAIL_PORT' => 'required|numeric|max:999|min:0',
            'MAIL_USERNAME' => 'required|string|max:50|min:1',
            'MAIL_PASSWORD' => 'required|string|max:50|min:1',
            'MAIL_FROM_ADDRESS' => 'required|email|max:50|min:1',
            'MAIL_FROM_NAME' => 'required|string|max:50|min:1',
        ]);
        $emailserver = new Emailserver();
        $emailserver->title = $request->title;
        $emailserver->MAIL_MAILER = $request->MAIL_MAILER;
        $emailserver->MAIL_HOST = $request->MAIL_HOST;
        $emailserver->MAIL_PORT = $request->MAIL_PORT;
        $emailserver->MAIL_USERNAME = $request->MAIL_USERNAME;
        $emailserver->MAIL_PASSWORD = $request->MAIL_PASSWORD;
        $emailserver->MAIL_ENCRYPTION = $request->MAIL_ENCRYPTION;
        $emailserver->MAIL_FROM_ADDRESS = $request->MAIL_FROM_ADDRESS;
        $emailserver->MAIL_FROM_NAME = $request->MAIL_FROM_NAME;

        $emailserver->save();
        return redirect()->route('patbd.emailservers.index')->with('success', 'Email server saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Emailserver $emailserver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emailserver $emailserver)
    {
        return view('backend.emailservers.edit', compact('emailserver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emailserver $emailserver)
    {
        $request->validate([
            'title' => 'required|string|max:50|min:1',
            'MAIL_HOST' => 'required|string|max:50|min:1',
            'MAIL_PORT' => 'required|numeric|max:999|min:0',
            'MAIL_USERNAME' => 'required|string|max:50|min:1',
            'MAIL_PASSWORD' => 'required|string|max:50|min:1',
            'MAIL_FROM_ADDRESS' => 'required|email|max:50|min:1',
            'MAIL_FROM_NAME' => 'required|string|max:50|min:1',
        ]);
        $emailserver->title = $request->title;
        $emailserver->MAIL_MAILER = $request->MAIL_MAILER;
        $emailserver->MAIL_HOST = $request->MAIL_HOST;
        $emailserver->MAIL_PORT = $request->MAIL_PORT;
        $emailserver->MAIL_USERNAME = $request->MAIL_USERNAME;
        $emailserver->MAIL_PASSWORD = $request->MAIL_PASSWORD;
        $emailserver->MAIL_ENCRYPTION = $request->MAIL_ENCRYPTION;
        $emailserver->MAIL_FROM_ADDRESS = $request->MAIL_FROM_ADDRESS;
        $emailserver->MAIL_FROM_NAME = $request->MAIL_FROM_NAME;

        $emailserver->save();
        return redirect()->route('patbd.emailservers.index')->with('success', 'Email server updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emailserver $emailserver)
    {
        $emailserver->delete();
        return redirect()->route('patbd.emailservers.index')->with('success', 'Email Server deleted!');
    }
}
