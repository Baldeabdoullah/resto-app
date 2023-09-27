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
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $tables = Table::where('status', TableStatus::Disponible)->get();
        return view('admin.reservations.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Choisissez le nombre d\'invités en fonction des tables');
        }

        if ($request->res_date < now()->format('Y-m-d')) {
            return back()->with('warning', 'Choisissez Une date coherantes');
        }
        // $request_date = Carbon::parse($request->res_date);

        // foreach ($table->reservations as $res) {

        //     if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
        //         return back()->with('warning', 'Cette table est deja reserve');
        //     }
        // }

        Reservation::create($request->validated());

        return to_route('admin.reservations.index')->with('success', 'Reservation cree avec success');
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
        $tables = Table::where('status', TableStatus::Disponible)->get();
        return view('admin.reservations.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Choisissez le nombre d\'invités en fonction des tables');
        }

        if ($request->res_date < now()->format('Y-m-d')) {
            return back()->with('warning', 'Choisissez Une date coherantes');
        }

        $reservations = $table->reservations()->where('id', '!=', $reservation->id)->get();

        $reservation->update($request->validated());


        return to_route('admin.reservations.index')->with('success', 'Reservation modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return to_route('admin.reservations.index')->with('success', 'Reservation supprimé avec success');
    }
}
