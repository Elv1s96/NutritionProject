<?php

namespace App\Http\Controllers;

use App\Http\Requests\FitnessRequest;
use App\Models\Fitness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\СaloriesCalculator as CC;

class FitnessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userName = Auth::user()->name;
        $isExists = Fitness::where('user_id', Auth::user()->id)->first();

        if ($isExists == null) {
            return view('users.fitnessProfileCreate');
        } else {
            $data = $isExists;
            //return view('users.fitnessProfileShow', compact('data'));
            return view('users.fitnessProfileShow');
        }

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

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FitnessRequest $request)
    {
        $params = $request->all();
        $without_changing_the_weight = CC::calculateCalories($params['growth'], $params['starting_weight'], $params['age'], $params['gender'], $params['exercise_stress']);
        $params['user_id'] = Auth::user()->id;
        $params['current_weight'] = $params['starting_weight'];
        $params['without_changing_the_weight'] = $without_changing_the_weight;
        $params['weight_loss'] = $without_changing_the_weight - 550;
        $params['rapid_weight_loss'] = $without_changing_the_weight - 900;
        Fitness::create($params);
        //return redirect()->back()->with('success','Данные успешно сохранены');
        return view('users.fitnessProfileShow')->with('success', 'Данные успешно сохранены');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Fitness $fitness
     * @return \Illuminate\Http\Response
     */
    public function show(Fitness $fitness)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Fitness $fitness
     * @return \Illuminate\Http\Response
     */
    public function edit(Fitness $fitness)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fitness $fitness
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fitness $fitness)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Fitness $fitness
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fitness $fitness)
    {
        //
    }

    public function getUserFitnessInfo($userId)
    {

        $params=  Fitness::where('user_id', $userId)->first();
        $data = $params->toArray();
        $data['exercise_stress'] = CC::my_exercise_stress($data['exercise_stress']);
        $data['PFC'] = CC::PFC($data['without_changing_the_weight']);
        return $data;
    }
}
