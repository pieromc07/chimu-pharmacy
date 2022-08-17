<?php

namespace App\Http\Controllers;

use App\Models\TicketDetail;
use Illuminate\Http\Request;

/**
 * Class TicketDetailController
 * @package App\Http\Controllers
 */
class TicketDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketDetails = TicketDetail::paginate();

        return view('ticket-detail.index', compact('ticketDetails'))
            ->with('i', (request()->input('page', 1) - 1) * $ticketDetails->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticketDetail = new TicketDetail();
        return view('ticket-detail.create', compact('ticketDetail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TicketDetail::$rules);

        $ticketDetail = TicketDetail::create($request->all());

        return redirect()->route('ticket-details.index')
            ->with('success', 'TicketDetail created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticketDetail = TicketDetail::find($id);

        return view('ticket-detail.show', compact('ticketDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticketDetail = TicketDetail::find($id);

        return view('ticket-detail.edit', compact('ticketDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TicketDetail $ticketDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketDetail $ticketDetail)
    {
        request()->validate(TicketDetail::$rules);

        $ticketDetail->update($request->all());

        return redirect()->route('ticket-details.index')
            ->with('success', 'TicketDetail updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ticketDetail = TicketDetail::find($id)->delete();

        return redirect()->route('ticket-details.index')
            ->with('success', 'TicketDetail deleted successfully');
    }
}
