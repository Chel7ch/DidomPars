<?php

namespace App\Http\Controllers;

use App\English;
use App\Services\EnglishService;
use Illuminate\Http\Request;

class EnglishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        !empty($_GET['alf']) ? $char = EnglishService::alphabetSign($_GET['alf']) : $char = 'a%';
        $lim = 15;
        $words = EnglishService::getEnWords($char, $lim);
        $char = $char[0];
        return view('content.words.indexWord', compact('words', 'char'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\English  $english
     * @return \Illuminate\Http\Response
     */
    public function show(English $english)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\English  $english
     * @return \Illuminate\Http\Response
     */
    public function edit(English $english)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\English  $english
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, English $english)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\English  $english
     * @return \Illuminate\Http\Response
     */
    public function destroy(English $english)
    {
        //
    }
}
