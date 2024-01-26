<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $statuses = Status::orderBy('created_at', 'desc');

    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        $statuses->where('name', 'like', '%' . $searchTerm . '%');
    }

    $statuses = $statuses->paginate(10);

    return view('statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $data = request()->only('name', 'description');
        //insert into DB
        Status::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
        session()->flash('statusKey', 'Status was created!');
        return to_route('status.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($status)
    {
        $status = Status::findOrFail($status);
        return view('statuses.edit', [
            'status' => $status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Status $status)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $data = request()->only('name', 'description');

        $status->update([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
        //session()->flash('statusKey', 'Status was updated!');
        return to_route('status.index')->with('statusKey', 'Status was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        //Elimina el registro de la base de datos
        $status->delete();
        session()->flash('statusKey', 'Status was deleted!');
        return to_route('status.index');
    }
}
