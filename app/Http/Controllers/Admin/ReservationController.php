<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tables = Table::where('status', TableStatus::Avaliable)->get();
        return view('admin.reservations.create', compact('tables'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request)
    {
        //
        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table->guest_number)
        {
            return back()->with('warning', 'Please choose table base on guests !');
        }

        //$request_date = Carbon::parse($request->res_date);
        foreach($table->reservations as $reservation)
        {

            if($reservation->res_date== $request->res_date){
                return back()->with('warning', 'This table is reserved for this day !');
            }
        }
        Reservation::create($request->validated());
        return to_route('admin.reservations.index')->with('success', 'Reservation created successfuly !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
        $tables = Table::where('status', TableStatus::Avaliable)->get();
        return view('admin.reservations.edit', compact('reservation','tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //

        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'tel_number' => ['required'],
            'email' => ['required', 'email'],
            'guest_number' => ['required'],
            'table_id' => ['required'],
            'res_date' => ['required', 'date'],
        ]);
        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table->guest_number)
        {
            return back()->with('warning', 'Please choose table base on guests !');
        }
        $reservation->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'tel_number' => $request->tel_number,
            'email' => $request->email,
            'guest_number' => $request->guest_number,
            'table_id' => $request->table_id,
            'res_date' => $request->res_date
        ]);

        return to_route('admin.reservations.index')->with('success', ' The reservation has been updated successfuly !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
        $reservation->delete();
        return to_route('admin.reservations.index')->with('danger', 'Reservation deleted successfuly !');
    }
}
