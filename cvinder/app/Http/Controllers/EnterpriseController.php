<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Models\Province;
use App\Models\Sector;
use App\Models\Skill;
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

    public function check(StoreEnterpriseRequest $request)
    {
        $password = DB::select('select password from enterprises where mail = "' . $request["enterprise"] . '"');
        $yourenterprise = DB::select('select * from enterprises where mail = "' . $request["enterprise"] . '"');
        if ($yourenterprise != null) {
            $enterprise = Enterprise::find($yourenterprise[0]->id);
            $province = Province::find($yourenterprise[0]->province_id);

            $provinces = Province::all();
            //var enterprise contiene la empresa, var province contiene la provincia, var provinces contiene todas las provincias

            // return $password["password"];
            // return Hash::check($request["enterprisepwd"], $password[0]->password);
            // return $request["enterprisepwd"];
            if (Hash::check($request["enterprisepwd"], $password[0]->password)) {
                if ($enterprise->firstTime == 1) {
                    $sectors = Sector::all();
                    $skills = Skill::all();
                    return view('offer.form')
                        ->with(['enterprise' => $enterprise, 'sectors' => $sectors, 'skills' => $skills]);
                } else {
                    return view('enterprise.profile')
                        ->with(['enterprise' => $enterprise, 'provinces' => $provinces, 'prov' => $province]);
                }
            } else {
                return redirect()->route('layouts.login');
            }
        } else {
            return redirect()->route('layouts.login');
        }
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
    public function edit(StoreEnterpriseRequest $request)
    {
        if ($request["user"] != "") {
            DB::table('enterprises')
                ->where('mail', $request["mail"])
                ->update(['name' => $request["user"]]);
        }
        if ($request["desc"] != "") {
            DB::table('enterprises')
                ->where('mail', $request["mail"])
                ->update(['description' => $request["desc"]]);
        }
        if ($request["province"] != "") {
            DB::table('enterprises')
                ->where('mail', $request["mail"])
                ->update(['province_id' => $request["province"]]);
        }


        $yourenterprise = DB::select('select * from enterprises where mail = "' . $request["mail"] . '"');
        // dd( $request);

        $enterprise = Enterprise::find($yourenterprise[0]->id);
        $province = Province::find($yourenterprise[0]->province_id);
        $provinces = Province::all();

        return view('enterprise.profile')
            ->with(['enterprise' => $enterprise, 'provinces' => $provinces, 'prov' => $province]);
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

    public function return (StoreEnterpriseRequest $request) {
        $enterprise = Enterprise::find($request["enterprise"]);
        $province = Province::find($enterprise->province_id);
        $provinces = Province::all();
        return view('enterprise.profile')
            ->with(['enterprise' => $enterprise, 'provinces' => $provinces, 'prov' => $province]);
    }
}
