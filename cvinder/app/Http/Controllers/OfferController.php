<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Enterprise;
use App\Models\Province;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\OfferSkill;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('offer.index');
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
        return view('offer.form');
    }

    public function matches()
    {
        return view('offer.matches');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOfferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfferRequest $request)
    {
        $offer = new Offer();
        $offer->title = $request["offerTitle"];
        $offer->description = $request["desc"];
        $offer->sector_id = $request["sector"];
        $offer->enterprise_id = $request["enterpriseid"];
        $offer->save();

        foreach($request['myskills'] as $key => $skillnow){
            $skill = new OfferSkill();
            $skill->skill_id = $skillnow;
            $skill->offer_id = $offer->id;
            $skill->save();
        }

        $enterprise = Enterprise::find($request["enterpriseid"]);
        $province = Province::find($enterprise->province_id);
        $provinces = Province::all();

        return view('enterprise.profile')
                ->with(['enterprise' => $enterprise, 'provinces' => $provinces, 'prov' => $province]);

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
    public function edit(Offer $offer)
    {
        //
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
}
