<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temps = Template::active()->get();
        return view('backend.modules.quotation.create', compact('temps'));
    }

    public function toggleApprove(Request $request)
    {
        $className = '\App\Models\\' . title_case($request->model);
        $element = new $className();
        $element = $element->whereId($request->id)->first();
        $element->update([
            'approved' => !$element->approved
        ]);
        return redirect()->back()->with('success', 'Process Success');
    }

    public function toggleActive(Request $request)
    {
        $className = '\App\Models\\' . title_case($request->model);
        $element = new $className();
        $element = $element->whereId($request->id)->first();
        $element->update([
            'active' => !$element->active
        ]);
        return redirect()->back()->with('success', 'Process Success');
    }

    public function toggleAdmin(Request $request)
    {
        $className = '\App\Models\\' . title_case($request->model);
        $element = new $className();
        $element = $element->whereId($request->id)->first();
        $element->update([
            'admin' => !$element->admin
        ]);
        return redirect()->back()->with('success', 'Process Success');
    }
}
