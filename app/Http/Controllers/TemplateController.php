<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Template::all();
        return view('backend.modules.template.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.template.create');
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
            'name' => 'required',
            "url" => "required|mimes:pdf|max:10000"
        ]);

        if ($validator->fails()) {
            return redirect()->route('template.create')->withErrors($validator)->withInput();
        }
        $template = Template::create(['name' => $request->name]);

        if ($template) {
            if ($request->hasFile('url')) {
                $this->saveMimes($template, $request, ['url']);
            }
            return redirect()->route('template.index')->with('success', 'template success');
        }
        return redirect()->back()->with('error', 'template failure');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Template::whereId($id)->first();
        return view('backend.modules.tempalte.edit', compact('element'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            "file" => "required|mimes:pdf|max:10000"
        ]);

        if ($validator->fails()) {
            return redirect()->route('template.edit', $id)->withErrors($validator);
        }
        $template = Template::whereId($id)->first()->update(['name' => $request->name]);
        if ($template) {
            if ($request->hasFile('url')) {
                $this->saveMimes($template, $request, ['url']);
            }
            return redirect()->route('template.index')->with('success', 'template success');
        }
        return redirect()->back()->with('error', 'template failure');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Template::whereId($id)->first();
        $element->delete();
        return redirect()->route('template.index')->with('succes', 'process deleted success');
    }
}
