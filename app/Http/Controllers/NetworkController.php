<?php

namespace App\Http\Controllers;

use App\Models\Network;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class NetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $network= Network::SELECT( 'id','Connection','type','inbound','outbound','total',
        'remark','month_date','current_team_id','active')
        ->where('active', 1)->paginate(10);
        return view('network.index', compact('network'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('networks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
            $request->validate([
                'Connection' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'inbound' => 'required|string|max:255',
                'outbound' => 'required|string|max:255',
                'total' => 'required|string|max:255',
                'remark' => 'required|string|max:255',
                'month_date' => 'required|string|max:255',
                'current_team_id' => 'required|string|max:255',
                'active' => 'required|string|max:255'
            ]);
            Network::create([
                'Connection' => $request->Connection,
                'type' => $request->type,
                'inbound' =>  $request->inbound,
                'outbound' =>  $request->outbound,
                'total' =>  $request->total,
                'remark' =>  $request->remark,
                'month_date' =>  $request->month_date,
                'current_team_id' =>  $request->current_team_id,
                'active' =>  $request->active,
            ]);
            return redirect()->route('network.index')->with('status','Network Create Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(Network $network)
    {
        return view('network.show', compact('network'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Network $network)
    {
        return view('network.edit', compact('network'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Network $network): RedirectResponse
    {
        $request->validate([
            'Connection' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'inbound' => 'required|string|max:255',
            'outbound' => 'required|string|max:255',
            'total' => 'required|string|max:255',
            'remark' => 'required|string|max:255',
            'month_date' => 'required|string|max:255',
            'current_team_id' => 'required|string|max:255',
            'active' => 'required|string|max:255'
        ]);

            $network->title = $request->Connection;
            $network->title = $request->type;
            $network->title = $request->inbound;
            $network->title = $request->outbound;
            $network->title = $request->total;
            $network->title = $request->remark;
            $network->title = $request->month_date;
            $network->title = $request->current_team_id;
            $network->title = $request->active;
            $network->save();


            return redirect()->route('network.index')->with('status', 'network Updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Network $network)
    {
        $network->delete();

        return redirect()->route('network.index')->with('status', 'network Delete Successfully');
    }
}
