<?php

namespace App\Http\Controllers;

use App\English;
use App\Word;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EnglishController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('content.words.createWord');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        English::saveNewWord($request);

        return redirect('english');
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
//        $word = $word[0];

        return view('content.words.showWord', compact('word'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param English $english
     * @return \Illuminate\Http\Response
     */
    public function edit($english)
    {
        $word = English::enWordAnotherMeaning($english);
        $word = $word[0];

        //Rule::unique('words')->ignore($id);
//        $word=English::findOrFail($english);
// 		Validator::make($data, [
//     'english' => [
//         'required','unique:words','alpha'],
// ]);
//echo '<pre>';
        print_r($word);
        return view ('content.words.editWord', compact('word'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param English $english
     * @return \Illuminate\Http\Response
     */
    public function update($english, Request $request)
    {
//        $word=English::findOrFail($english);
        $word = English::enWordAnotherMeaning($english);
        $word = $word[0];

        echo '<pre>';
        print_r($word);
        $word->update($request->all());
        print_r($request->all());
//        return redirect('english');
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
