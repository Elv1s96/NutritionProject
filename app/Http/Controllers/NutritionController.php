<?php

namespace App\Http\Controllers;

use App\Http\Requests\NutritionRequest;
use App\Models\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $total = [
//            'name' => 'total',
//            'calories' => 0,
//            'proteins' => 0,
//            'fats' => 0,
//            'carbohydrates' => 0
//        ];
//        $userId = Auth::user()->id;
//        $products = User::find($userId)->products('=',Carbon::now()->format('Y-m-d'))->get(); //->where('created_at',$currentDate);
//        foreach($products as $product)
//        {
//
//            $total['calories'] = $product->calories*($product->pivot->weight/100) + $total['calories'];
//            $total['proteins'] = $product->proteins*($product->pivot->weight/100) + $total['proteins'];
//            $total['fats'] = $product->fats*($product->pivot->weight/100) + $total['fats'];
//            $total['carbohydrates'] = $product->carbohydrates*($product->pivot->weight/100) + $total['carbohydrates'];
//
//        }
        // return view('users.nutrition.index',compact('products','total'));
        return view('users.nutrition.index');
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
     *t
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NutritionRequest $request)
    {

        $params = $request->all();
        //dd($params);
        $check = DB::table('products')->where('name', $params['name'])->first();
        $userId = Auth::user()->id;
        $weight = $params['weight'];
        if ($check == null) {
            unset($params['weight']);
            unset($params['_token']);
            unset($params['id']);
            $model = Product::create($params);
            $product_id = $model->id;
            DB::table('product_user')->insert(['user_id' => $userId, 'product_id' => $product_id, 'weight' => $weight]);
            //$id = DB::table('products')->insertGetId($params);
            //return redirect()->back()->with('success','Продукт добавлен');
            return response()->json(['status' => 'success', 'message' => 'Новый продукт добавлен в моё меню'], 200);
//            $response = [
//                'status' => 'success',
//                'message' => 'Новый продукт добавлен в моё меню'
//            ];
//            return $response;
        } else {
            DB::table('product_user')->insert(['user_id' => $userId, 'product_id' => $params['id'], 'weight' => $weight]);
            return response()->json(['status' => 'success', 'message' => 'Новый продукт добавлен в моё меню'], 200);
//            $response = [
//                'status' => 'success',
//                'message' => 'Продукт из таблицы добавлен в моё меню'
//            ];
//            return $response;
            //return redirect()->back()->with('success','Продукт добавлен');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeFromTable(Request $request)
    {
        $params = $request->all();
        foreach ($params as $param) {
            if ($param != null) {
                dump($param);
            }
        }
        dd($request->all());
    }

    public function getNutritionData($userId)
    {

        $total = [
            'name' => 'total',
            'calories' => 0,
            'proteins' => 0,
            'fats' => 0,
            'carbohydrates' => 0,
            'weight' => 0,
        ];
        //$userId = Auth::user()->id;
        $products = User::find($userId)->products('=', Carbon::now()->format('Y-m-d'))->get()->toArray(); //->where('created_at',$currentDate);
        foreach ($products as &$product) {
            $product['calories'] = round($product['calories'] * ($product['weight'] / 100), 2);
            $product['proteins'] = round($product['proteins'] * ($product['weight'] / 100), 2);
            $product['fats'] = round($product['fats'] * ($product['weight'] / 100), 2);
            $product['carbohydrates'] = round($product['carbohydrates'] * ($product['weight'] / 100), 2);

            $total['calories'] = round($product['calories'] + $total['calories'], 2);
            $total['proteins'] = round($product['proteins'] + $total['proteins'], 2);
            $total['fats'] = round($product['fats'] + $total['fats'], 2);
            $total['carbohydrates'] = round($product['carbohydrates'] + $total['carbohydrates'], 2);
            $total['weight'] = round($product['weight'], 2) + $total['weight'];
        }
        $response['products'] = $products;
        $response['total'] = $total;
        //dd($response);
        return $response;
    }

    public function deleteFromNutrition($productId, $userId, $pivotId)
    {
        DB::table('product_user')->where('id', $pivotId)->delete();
        return response()->json(['status' => 'success', 'message' => 'Продукт удален из меню'], 200);
//        $response = [
//            'status' => 'success',
//            'message' => 'Продукт удален из меню'
//        ];
//        return $response;
    }

    public function getAllNutritionData($userId)
    {
        //$products = User::find($userId)->allProducts()->get()->toArray(); //->where('created_at',$currentDate);
        $products = User::find($userId)->allProducts; //->where('created_at',$currentDate);
        $dates = [];
        foreach ($products as &$product) {
            $dates[] = $product->created_at->format('Y-m-d');
        }
        $productsArray = $products->toArray();
        $productsCount = count($productsArray);
        $arrayUnique = array_unique($dates);
        for ($i = 0; $i < count($productsArray); $i++) {
            $productsArray[$i]['created_at'] = $dates[$i];
        }

        $totalArr = [];
        $labels = [];
        foreach ($arrayUnique as $au) {
            $totalArr[$au] = 0;
        }

        foreach ($products as $product) {
            $labels[] = $product->created_at->format('d');
            foreach ($arrayUnique as $au) {
                if ($product->created_at->format('Y-m-d') == $au) {
                    $totalArr[$au] = $totalArr[$au] + $product->calories;
                }
            }
        }
        foreach ($products as $product) {
            $arr[] = $product['calories'];
        }
        return [
            'labels' => array_values(array_unique($labels)),
            'datasets' => [
                [
                    'label' => 'Потребление каллорий',
                    'backgroundColor' => '#F26202',
                    'data' => array_values($totalArr),
                ]
            ]
        ];
    }
    public function sendWaterInfo($userId,$amountOfWater)
    {
            DB::table('water')->insert(
                ['user_id' => $userId, 'amount_of_water' => $amountOfWater]
            );
        return response()->json(['status' => 'success', 'message' => 'Бутылка наполнена'], 200);
//        $response = [
//            'status' => 'success',
//            'message' => 'Бутылка наполнена'
//        ];
//        return $response;

    }
    public function getWaterInfo($userId)
    {
       //$water = DB::table('water')->whereDate('created_at',Carbon::now()->format('Y-m-d'))->get();
        //$water = DB::table('water')->where('user_id',$userId)->whereDate('created_at',Carbon::now()->format('Y-m-d'))->sum('amount_of_water');
        $water = DB::table('water')->where('user_id',$userId)->whereDate('created_at',Carbon::now()->format('Y-m-d'))->select('amount_of_water',DB::raw("DATE_FORMAT(`created_at`, '%H:%i:%s') as 'time'"))->get()->toArray();
        $totalAmountOfWater = 0;
        foreach($water as $amount)
        {
            $totalAmountOfWater = $totalAmountOfWater + $amount->amount_of_water;
        }
        $water_array = [
            'water_info' => $water,
            'total_amount_of_water' => $totalAmountOfWater
        ];
        return($water_array);

    }
}
