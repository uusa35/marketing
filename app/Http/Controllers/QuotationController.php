<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->isAdmin) {
            $elements = Quotation::with('user')->get();
        } else {
            $elements = Quotation::where('user_id', auth()->user()->id)->all();
        }
        return view('backend.modules.quotation.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.quotation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = Quotation::create($request->all());
        if ($element) {
            return redirect()->route('quotation.index')->with('success', 'process success');
        }
        return redirect()->route('quotation.create')->with('error', 'process error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $element = Quotation::with('user')->whereId($id)->first();
        return view('backend.modules.quotation.show', compact('element'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Quotation::whereId($id)->first();
        return view('backend.modules.quotation.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $element = Quotation::whereId($id)->first();
        if ($element->update($request->all())) {
            return redirect()->route('quotation.index')->with('success', 'process success');
        }
        return redirect()->route('quotation.index')->with('error', 'process error');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Quotation::whereId($id)->first();
        if ($element->delete()) {
            return redirect()->route('quotation.index')->with('success', 'process success');
        }
        return redirect()->route('quotation.index')->with('error', 'process error');
    }

    public function send(Request $request) {

        $element = Quotation::whereId($request->id)->first();
        $element->update(['approved' => true]);
//        return view('backend.email',compact('element'));
        $element = new \App\Mail\Quotation($element);
        return Mail::to('uusa35@gmail.com')->send($element);

    }
}
