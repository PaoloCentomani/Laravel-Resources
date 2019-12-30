<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupport;
use App\Mail\SupportStored;
use Illuminate\Support\Facades\Mail;
use Spatie\Honeypot\ProtectAgainstSpam;

class SupportController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(ProtectAgainstSpam::class)->only('store');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('support.create', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSupport  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupport $request)
    {
        Mail::send(new SupportStored($request));

        flash()->success(__('messages.support.success'));

        return redirect()->route('home');
    }
}
