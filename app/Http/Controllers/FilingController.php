<?php

namespace App\Http\Controllers;

use App\Models\Filing;
use Illuminate\Http\Request;

/**
 * Class FilingController
 * @package App\Http\Controllers
 */
class FilingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filings = Filing::paginate();

        return view('filing.index', compact('filings'))
            ->with('i', (request()->input('page', 1) - 1) * $filings->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filing = new Filing();
        return view('filing.create', compact('filing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Filing::$rules);

        $filing = Filing::create($request->all());

        return redirect()->route('filings.index')
            ->with('success', 'Filing created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filing = Filing::find($id);

        return view('filing.show', compact('filing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filing = Filing::find($id);

        return view('filing.edit', compact('filing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Filing $filing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filing $filing)
    {
        request()->validate(Filing::$rules);

        $filing->update($request->all());

        return redirect()->route('filings.index')
            ->with('success', 'Filing updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $filing = Filing::find($id)->delete();

        return redirect()->route('filings.index')
            ->with('success', 'Filing deleted successfully');
    }
}
