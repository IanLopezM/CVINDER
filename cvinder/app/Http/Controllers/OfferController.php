<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Enterprise;
use App\Models\Province;
use App\Models\Sector;
use App\Models\Skill;
use App\Models\OfferSkill;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\OfferWorker;
use Illuminate\Http\Request;
use App\Models\Worker;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StoreOfferRequest $offer)
    {
        $thisoffer = Offer::find($offer["offer"]);
        $enterprise = $thisoffer["enterprise_id"];
        $thisenterprise = Enterprise::find($enterprise);
        $allworkers = Worker::all();
        $allprovinces = Province::all();
        return view('offer.index')
            ->with(['enterprise' => $thisenterprise, 'offer' => $thisoffer, 'allworkers' => $allworkers, 'allprovinces' => $allprovinces]);
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

    public function form(StoreOfferRequest $request)
    {
        // dd($request);
        $enterprise = Enterprise::find($request["enterprise"]);
        $sectors = Sector::all();
        $skills = Skill::all();

        return view('offer.form')
            ->with(['enterprise' => $enterprise, 'sectors' => $sectors, 'skills' => $skills]);
    }

    public function matches()
    {
        return view('offer.matches');
    }

    public function profile(StoreOfferRequest $offer)
    {
        // dd($offer["offer"]);
        $thisoffer = Offer::find($offer["offer"]);
        // if ($thisoffer->)
        if ($thisoffer != null) {
            $enterprise = Enterprise::find($thisoffer["enterprise_id"]);
            $sectors = Sector::all();
            $offerskills = DB::select("select * from offer_skills where offer_id = " . $offer["offer"]);
            // dd($offerskills);
            $skills = Skill::all();
            return view('offer.profile')
                ->with(['offer' => $thisoffer, 'enterprise' => $enterprise, 'sectors' => $sectors, 'skills' => $skills, 'offerskills' => $offerskills]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOfferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfferRequest $request)
    {
        $checkifexists = DB::select("select * from offers where sector_id = " . $request["sector"] . " & enterprise_id = " . $request["enterpriseid"]);

        if ($checkifexists == null) {
            $offer = new Offer();
            $offer->title = $request["offerTitle"];
            $offer->description = $request["desc"];
            $offer->sector_id = $request["sector"];
            $offer->enterprise_id = $request["enterpriseid"];
            $offer->save();

            foreach ($request['myskills'] as $key => $skillnow) {
                $skill = new OfferSkill();
                $skill->skill_id = $skillnow;
                $skill->offer_id = $offer->id;
                $skill->save();
            }

            $enterprise = Enterprise::find($request["enterpriseid"]);
            $enterprise->firstTime = false;
            $enterprise->save();
            $province = Province::find($enterprise->province_id);
            $provinces = Province::all();

            return view('enterprise.profile')
                ->with(['enterprise' => $enterprise, 'provinces' => $provinces, 'prov' => $province]);
        } else {
            $enterprise = Enterprise::find($request["enterpriseid"]);
            $enterprise->firstTime = false;
            $enterprise->save();
            $province = Province::find($enterprise->province_id);
            $provinces = Province::all();

            return view('enterprise.profile')
                ->with(['enterprise' => $enterprise, 'provinces' => $provinces, 'prov' => $province]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreOfferRequest $request)
    {
        // dd($request);
        if ($request["offerTitle"] != null) {
            DB::table('offers')
                ->where('id', $request["offerid"])
                ->update(['title' => $request["offerTitle"]]);
        }
        if ($request["desc"] != null) {
            DB::table('offers')
                ->where('id', $request["offerid"])
                ->update(['title' => $request["desc"]]);
        }

        DB::table('offers')
            ->where('id', $request["offerid"])
            ->update(['sector_id' => $request["sector"]]);

        $skillsofferstodelete = OfferSkill::where("offer_id", "=", $request["offerid"])->delete();

        foreach ($request["myskills"] as $key => $skillnow) {
            $thisskill = new OfferSkill();
            $thisskill->skill_id = $skillnow;
            $thisskill->offer_id = $request["offerid"];
            $thisskill->save();
        }

        $enterprise = Enterprise::find($request["enterpriseid"]);
        $province = Province::find($enterprise->province_id);
        $provinces = Province::all();

        return view('enterprise.profile')
            ->with(['enterprise' => $enterprise, 'provinces' => $provinces, 'prov' => $province]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfferRequest  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }

    public function save(Request $request)
    {
        //de empresa a trabajador
        $existoffer = DB::select("select * from offer_workers where worker_id = " . $request["workerid"] . " & offer_id = " . $request["offerid"]);
        if (count($existoffer) > 0) {
            $thisoffer = OfferWorker::find($existoffer[0]->id)->delete();
            if ($thisoffer->worker_ok == false) {
                $newoffer = new Offer();
                $newoffer->offer_id = $request["offerid"];
                $newoffer->offer_ok = true;
                $newoffer->worker_id = $request["workerid"];
                $newoffer->worker_ok = true;
                $newoffer->save();
            }
        } else {
            $newoffer = new OfferWorker();
            $newoffer->offer_id = $request["offerid"];
            $newoffer->offer_ok = true;
            $newoffer->worker_id = $request["workerid"];
            $newoffer->worker_ok = false;
            $newoffer->save();
        }

        return $request;
    }
}
