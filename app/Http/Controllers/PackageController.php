<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Status;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /*public function index(Request $request)
    {
        $packages = Package::orderBy('id', 'desc')->paginate(100);

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $packages->where('tracking', 'like', '%' . $searchTerm . '%');
        }

        //$packages = $query->get();

        return view('packages.index', compact('packages'));
    }*/

    public function index(Request $request)
    {
        $packages = Package::query();

        if($request->has('search')){
            $searchTerm = $request->input('search');
            $packages->where('tracking', 'like', '%' . $searchTerm . '%');
        }

        $packages = $packages->get();
    
        return view('packages.index', compact('packages'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $statuses = Status::all();

        return view('packages.create', compact('customers', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tracking' => 'required|unique:packages',
            'weight' => 'required|integer',
            'description' => 'required|string',
            'customer_id' => 'required',
            'status_id' => 'required',
        ]);

        $data = request()->only('tracking', 'weight', 'description', 'customer_id', 'status_id');
        //insert into DB
        Package::create([
            'tracking' => $data['tracking'],
            'weight' => $data['weight'],
            'description' => $data['description'],
            'customer_id' => $data['customer_id'],
            'status_id' => $data['status_id'],
        ]);
        session()->flash('statusKey', 'Package was created!');
        return to_route('packages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {   

        $customers = Customer::all();
        $statuses = Status::all();

        return view('packages.edit', [
            'package' => $package,
            'customers' => $customers,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        $request->validate([
            'tracking' => 'required|unique:packages,tracking,' . $package->id . ',id',
            'weight' => 'required|integer',
            'description' => 'required|string',
            'customer_id' => 'required',
            'status_id' => 'required',
        ]);

        $data = request()->only('tracking', 'weight', 'description', 'customer_id', 'status_id');

        $package->update([
            'tracking' => $data['tracking'],
            'weight' => $data['weight'],
            'description' => $data['description'],
            'customer_id' => $data['customer_id'],
            'status_id' => $data['status_id'],
        ]);

        session()->flash('statusKey', 'Package was updated!');
        return to_route('packages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();
        session()->flash('statusKey', 'Package was deleted!');
        return to_route('packages.index');
    }
}
