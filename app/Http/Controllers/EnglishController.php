<?php

namespace App\Http\Controllers;

use App\English;
//use App\Services\EnglishShowwService;
use App\Word;
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
        !empty($_GET['alf']) ? $char = English::alphabetSign($_GET['alf']) : $char = 'a%';
        $lim = 15;
        $words = English::enWordAnotherMeaning(English::enWordsList($char, $lim));

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
        return view('content.words.createWord');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        English::create($request->all());
        return redirect('word');
    }

    /**
     * Display the specified resource.
     *
     * @param English $english
     * @return \Illuminate\Http\Response
     */
    public function show($english)
    {
        $word = English::enWordAnotherMeaning($english);
        $word =$word [0];

        return view ('content.words.showWord',compact('word'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param English $english
     * @return \Illuminate\Http\Response
     */
    public function edit(English $english)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param English $english
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, English $english)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param English $english
     * @return \Illuminate\Http\Response
     */
    public function destroy(English $english)
    {
        //
    }
}
