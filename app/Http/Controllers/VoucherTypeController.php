<?php

namespace App\Http\Controllers;

use App\Models\VoucherType;
use Illuminate\Http\Request;

/**
 * Class VoucherTypeController
 * @package App\Http\Controllers
 */
class VoucherTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voucherTypes = VoucherType::paginate();

        return view('voucher-type.index', compact('voucherTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $voucherTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $voucherType = new VoucherType();
        return view('voucher-type.create', compact('voucherType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(VoucherType::$rules);

        $voucherType = VoucherType::create($request->all());

        return redirect()->route('voucher-types.index')
            ->with('success', 'VoucherType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voucherType = VoucherType::find($id);

        return view('voucher-type.show', compact('voucherType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voucherType = VoucherType::find($id);

        return view('voucher-type.edit', compact('voucherType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  VoucherType $voucherType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoucherType $voucherType)
    {
        request()->validate(VoucherType::$rules);

        $voucherType->update($request->all());

        return redirect()->route('voucher-types.index')
            ->with('success', 'VoucherType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $voucherType = VoucherType::find($id)->delete();

        return redirect()->route('voucher-types.index')
            ->with('success', 'VoucherType deleted successfully');
    }
}
