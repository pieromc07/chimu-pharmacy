<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Ticket;
use App\Models\TicketDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class TicketController
 * @package App\Http\Controllers
 */
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::paginate();

        return view('ticket.index', compact('tickets'))
            ->with('i', (request()->input('page', 1) - 1) * $tickets->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticket = new Ticket();
        $ticketNumber = "TK0000".(Ticket::max('ticket_number') + 1);
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();
        $ticket->ticket_number = $ticketNumber;
        $ticket->date = date('Y-m-d');
        $ticket->total = 0;
        $ticket->discount = 0;
        $ticket->employee_id = $employee->id;
        $products = Product::all();
        $categories = Category::all();
        return view('ticket.create', compact('ticket', 'products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        $customer = Customer::create([
            'document' => $request->customer_id,
        ]);

        $ticket = Ticket::create([
            'ticket_number' => $request->ticket_number,
            'date' => $request->date,
            'total' => $request->total,
            'discount' => 0,
            'employee_id' => $request->employee_id,
            'customer_id' => $customer->id,
        ]);
        $products = $request->list_products;
        $quantiities = $request->list_quantity;
        $prices = $request->list_price;

        for ($i=0; $i < sizeof($products); $i++) {
            TicketDetail::create([
                'ticket_id' => $ticket->id,
                'product_id' => $products[$i],
                'quantity' => $quantiities[$i],
                'price' => $prices[$i],
            ]);
        }

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);

        return view('ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::find($id);

        return view('ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        request()->validate(Ticket::$rules);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id)->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket deleted successfully');
    }
}
