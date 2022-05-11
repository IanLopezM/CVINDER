<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Models\Province;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreEnterpriseRequest;
use App\Http\Requests\UpdateEnterpriseRequest;
use Illuminate\Support\Facades\Hash;

class EnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function form()
    {
        $provinces = Province::all();

        return view('enterprise.form')
            ->with('provinces', $provinces);
    }

    public function profile()
    {
        return view('enterprise.profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEnterpriseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnterpriseRequest $request)
    {
        $userExists = DB::select('select * from enterprises where mail = "' . $request["mail"] . '"');

        if ($userExists == null) {
            $enterprise = new Enterprise();
            $enterprise->name = $request["user"];
            $enterprise->mail = $request["mail"];
            $enterprise->password = Hash::make($request["pwd"]);
            $enterprise->description = $request["desc"];
            $enterprise->province_id = $request["province"];
            
            if ($request["needOffer"] == "needOffer") {
                $enterprise->firstTime = true;
            } else {
                $enterprise->firstTime = false;
            }
            $enterprise->save();
            
            return redirect()->route('welcome');
        } else {
            return redirect()->route('enterprise.form');
        }

    }

    public function check(Enterprise $enterprise) {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function show(Enterprise $enterprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function edit(Enterprise $enterprise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEnterpriseRequest  $request
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnterpriseRequest $request, Enterprise $enterprise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enterprise $enterprise)
    {
        //
    }
}
