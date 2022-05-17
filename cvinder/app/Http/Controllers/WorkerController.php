<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Models\Province;
use App\Models\Academic;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Offer;
use App\Models\Sector;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;
use App\Models\Enterprise;
use App\Models\SkillWorker;
use App\Models\OfferWorker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StoreWorkerRequest $worker)
    {
        $thisworker = Worker::find($worker["worker"]);


        $alloffers = Offer::all();
        $allsectors = Sector::all();
        $allskills = Skill::all();

        return view('worker.index')
            ->with(['alloffers' => $alloffers, 'allsectors' => $allsectors, 'allskills' => $allskills, 'thisworker' => $thisworker]);
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

    public function profile(StoreWorkerRequest $request)
    {
        $worker = Worker::find($request["worker"]);
        $province = Province::find($worker->province_id);
        $provinces = Province::all();
        $skills = Skill::all();
        $experiences = DB::select("select * from experiences where worker_id = " . $worker->id);
        $formations = DB::select("select * from academics where worker_id = " . $worker->id);
        $myskills = DB::select("select * from skill_workers where worker_id = " . $worker->id);

        return view('worker.profile')
        ->with(['worker' => $worker, 'provinces' => $provinces, 'prov' => $province, 'experiences' => $experiences, 'formations' => $formations, 'skills' => $skills, 'myskills' => $myskills]);
    }

    public function form()
    {
        $provinces = Province::all();
        $skills = Skill::all();

        return view('worker.form')
            ->with(['provinces' => $provinces, 'skills' => $skills]);
    }

    public function matches(StoreWorkerRequest $worker)
    {
        $thisworker = Worker::find($worker["worker"]);
        $alloffers = Offer::all();
        $allenterprises = Enterprise::all();

        $arraymatches = [];

        foreach ($thisworker->matches as $match) {
            if($match->offer_ok == 1 && $match->worker_ok == 1) {
                array_push($arraymatches, $match);
            }
        }


        return view('worker.matches')
            ->with(['thisworker' => $thisworker, 'alloffers' => $alloffers, 'allenterprises' => $allenterprises, 'matches' => $arraymatches]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkerRequest $request)
    {
        $userExists = DB::select('select * from workers where mail = "' . $request["mail"] . '"');

        if ($userExists == null) {
            $worker = new Worker();
            $worker->name = $request["user"];
            $worker->surname = $request["lastname"];
            $worker->password = Hash::make($request["pwd"]);
            $worker->age = $request["edad"];
            $worker->address = $request["address"];
            $worker->mail = $request["mail"];
            $worker->province_id = $request["province"];
            $worker->save();

            $userid = DB::select('select id from workers where mail = "' . $request["mail"] . '"');

            for ($i = 0; $i < count($request["formUbi"]); $i++) {
                $thisAcademic = new Academic();
                $thisAcademic->location = $request["formUbi"][$i];
                $thisAcademic->title = $request["formTitle"][$i];
                $thisAcademic->yearStart = $request["formStart"][$i];
                $thisAcademic->yearEnd = $request["formEnd"][$i];
                $thisAcademic->worker_id = $userid[0]->id;
                $thisAcademic->save();
            }

            for ($i = 0; $i < count($request["expUbi"]); $i++) {
                $thisExperience = new Experience();
                $thisExperience->location = $request["expUbi"][$i];
                $thisExperience->charge = $request["expCharge"][$i];
                $thisExperience->yearStart = $request["expStart"][$i];
                $thisExperience->yearEnd = $request["expEnd"][$i];
                $thisExperience->worker_id = $userid[0]->id;
                $thisExperience->save();
            }

            for ($i = 0; $i < count($request["myskills"]); $i++) {
                $thisskillworker = new SkillWorker();
                $thisskillworker->worker_id = $userid[0]->id;
                $thisskillworker->skill_id = $request["myskills"][$i];
                $thisskillworker->save();
            }



            return redirect()->route('welcome');
        } else {
            return redirect()->route('worker.form');
        }

        //
    }

    public function check(StoreWorkerRequest $request)
    {
        $password = DB::select('select password from workers where mail = "' . $request["worker"] . '"');
        $yourworker = DB::select('select * from workers where mail = "' . $request["worker"] . '"');

        if ($yourworker != null) {
            $worker = Worker::find($yourworker[0]->id);
            $province = Province::find($yourworker[0]->province_id);
            $provinces = Province::all();
            $skills = Skill::all();
            $experiences = DB::select("select * from experiences where worker_id = " . $worker->id);
            $formations = DB::select("select * from academics where worker_id = " . $worker->id);
            $myskills = DB::select("select * from skill_workers where worker_id = " . $worker->id);

            if (Hash::check($request["workerpwd"], $password[0]->password)) {
                return view('worker.profile')
                    ->with(['worker' => $worker, 'provinces' => $provinces, 'prov' => $province, 'experiences' => $experiences, 'formations' => $formations, 'skills' => $skills, 'myskills' => $myskills]);
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
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreWorkerRequest $request)
    {
        if ($request["user"] != "") {
            DB::table('workers')
                ->where('mail', $request["mail"])
                ->update(['name' => $request["user"]]);
        }

        if ($request["lastname"] != "") {
            DB::table('workers')
                ->where('mail', $request["mail"])
                ->update(['surname' => $request["lastname"]]);
        }

        if ($request["address"] != "") {
            DB::table('workers')
                ->where('mail', $request["mail"])
                ->update(['address' => $request["address"]]);
        }

        if ($request["edad"] != "") {
            DB::table('workers')
                ->where('mail', $request["mail"])
                ->update(['age' => $request["edad"]]);
        }

        if ($request["province"] != "") {
            DB::table('workers')
                ->where('mail', $request["mail"])
                ->update(['province_id' => $request["province"]]);
        }

        $formationsToDelete = Academic::where("worker_id", "=", $request["workerid"])->delete();

        for ($i = 0; $i < count($request["formUbi"]); $i++) {
            $thisAcademic = new Academic();
            $thisAcademic->location = $request["formUbi"][$i];
            $thisAcademic->title = $request["formTitle"][$i];
            $thisAcademic->yearStart = $request["formStart"][$i];
            $thisAcademic->yearEnd = $request["formEnd"][$i];
            $thisAcademic->worker_id = $request["workerid"];
            $thisAcademic->save();
        }

        $experiencesToDelete = Experience::where("worker_id", "=", $request["workerid"])->delete();

        for ($i = 0; $i < count($request["expUbi"]); $i++) {
            $thisExperience = new Experience();
            $thisExperience->location = $request["expUbi"][$i];
            $thisExperience->charge = $request["expCharge"][$i];
            $thisExperience->yearStart = $request["expStart"][$i];
            $thisExperience->yearEnd = $request["expEnd"][$i];
            $thisExperience->worker_id = $request["workerid"];
            $thisExperience->save();
        }

        $skillworkerskillstodelete = SkillWorker::where("worker_id", "=", $request["workerid"])->delete();

        foreach ($request["myskills"] as $key => $skillnow) {
            $thisskill = new SkillWorker();
            $thisskill->skill_id = $skillnow;
            $thisskill->worker_id = $request["workerid"];
            $thisskill->save();
        }

        $worker = Worker::find($request["workerid"]);
        $province = Province::find($request["province"]);
        $provinces = Province::all();
        $skills = Skill::all();

        $experiences = DB::select("select * from experiences where worker_id = " . $worker->id);
        $myskills = DB::select("select * from skill_workers where worker_id = " . $worker->id);
        $formations = DB::select("select * from academics where worker_id = " . $worker->id);


        return view('worker.profile')
            ->with(['worker' => $worker, 'provinces' => $provinces, 'prov' => $province, 'experiences' => $experiences, 'formations' => $formations, 'skills' => $skills, 'myskills' => $myskills]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkerRequest  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkerRequest $request, Worker $worker)
    {
        //
    }

    public function save(Request $request)
    {
        $existoffer = DB::select("select * from offer_workers where worker_id = " . $request["workerid"] . " && offer_id = " . $request["offerid"]);

        if (count($existoffer) > 0) {
            $thisoffer = OfferWorker::find($existoffer[0]->id);
            if ($thisoffer->offer_ok == 1) {
                $newoffer = new OfferWorker();
                $newoffer->offer_id = $request["offerid"];
                $newoffer->offer_ok = true;
                $newoffer->worker_id = $request["workerid"];
                $newoffer->worker_ok = true;
                $newoffer->save();
                $thisoffer->delete();
            }
        } else {
            $newoffer = new OfferWorker();
            $newoffer->offer_id = $request["offerid"];
            $newoffer->offer_ok = false;
            $newoffer->worker_id = $request["workerid"];
            $newoffer->worker_ok = true;
            $newoffer->save();
        }

        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {
        //
    }
}
