<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
            $elements = Quotation::where('user_id', auth()->user()->id)->get();
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
        $temps = Template::active()->get();
        return view('backend.modules.quotation.create', compact('temps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'to' => 'required',
            'from' => 'required',
            'receivers' => 'required',
            'temps' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->route('quotation.create')->withErrors($validator);
        }

        $request->request->remove('files');
        $element = Quotation::create($request->except('temps'));
        $element->templates()->attach($request->temps);
        if ($element) {
            $this->sendQuotation($element);
            return redirect()->route('quotation.index')->with('success', 'Approved & Sent Successfully');
//            return redirect()->route('quotation.index')->with('success', 'process success');
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
        $elementTemps = $element->templates->pluck('id')->toArray();
        $temps = Template::active()->get();
        return view('backend.modules.quotation.edit', compact('element','temps','elementTemps'));
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
        $request->request->remove('files');
        $element = Quotation::whereId($id)->first();
        if ($element->update($request->except('temps'))) {
            $element->templates()->sync($request->temps);
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
        $element->templates()->detach($element->templates->pluck('id')->toArray());
        if ($element->delete()) {
            return redirect()->route('quotation.index')->with('success', 'process success');
        }
        return redirect()->route('quotation.index')->with('error', 'process error');
    }

    public function send(Request $request)
    {
        $quotation = Quotation::whereId($request->id)->first();
        $this->sendQuotation($quotation);
        return redirect()->route('quotation.index')->with('success', 'Approved & Sent Successfully');
    }

    public function sendQuotation(Quotation $quotation) {
        $quotation->update(['approved' => true, 'sent' => true]);
        $element = new \App\Mail\Quotation($quotation);
        $emails = explode(';', $quotation->receivers);
        $users = [];
        foreach($emails as $key => $ut){
            $ua = [];
            $ua['email'] = $ut;
            $users[$key] = (object)$ua;
        }
        return Mail::to($users)->queue($element);
    }
}
