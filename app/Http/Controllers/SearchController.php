<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.search');
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $products=DB::table('products')->where('name','LIKE','%'.$request->search."%")->first();

            if($products)
            {
                return response()->json([
                    'id' => $products->id,
                    'name' => $products->name,
                    'calories' => $products->calories,
                    'proteins' => $products->proteins,
                    'fats' => $products->fats,
                    'carbohydrates' => $products->carbohydrates
                ]);

//                foreach ($products as $key => $product) {
//                    $output.='<tr>'.
//                        '<td>'.$product->id.'</td>'.
//                        '<td>'.$product->name.'</td>'.
//                        '<td>'.$product->calories.'</td>'.
//                        '<td>'.$product->proteins.'</td>'.
//                        '<td>'.$product->fats.'</td>'.
//                        '<td>'.$product->carbohydrates.'</td>'.
//                        '</tr>';
//                }
//                return Response($output);
            }
        }
    }
    public function allProducts(Request $request)
    {
        if($request->ajax())
        {
            //$products = DB::table('products')->orderBy('name')->paginate(4);
            $output = DB::table('products')->orderBy('name')->paginate(4);

           $products = Product::get();
                $products = $products->sortBy('name');
            $output =' <form method="get" enctype="multipart/form-data" action="/storeFromTable"><table class="table table-hover text-center mt-3" style="border: 3px solid gray;">
            <thead>
            <tr>
            <th>Название</th>
            <th>Калории</th>
            <th>Белки (на 100гр)</th>
            <th>Жиры (на 100гр)</th>
            <th>Углеводы (на 100гр)</th>
            <th>Вес (Грамм)</th>
            <th>Добавить в список</th>
            </tr>
            </thead>
            <tbody>';
            foreach ($products as $key => $product) {
                    $output.='<tr>'.
                        '<td>'.$product->name.'</td>'.
                        '<td>'.$product->calories.'</td>'.
                        '<td>'.$product->proteins.'</td>'.
                        '<td>'.$product->fats.'</td>'.
                        '<td>'.$product->carbohydrates.'</td>'.
                        '<td>'.'<input type="text" class="form-check-input" id="weight" style="width:2%" name="weight.'.$product->id.'"</td>'.
                        '<td>'.'<input type="checkbox" class="form-check-input " value="'. $product->id.'"id="'.
                        $product->name.'"name="'.$product->id.'">'.'</td>'.
                    '</tr>';
                }
            $output.='
      </tbody>
        </table>
        <button class="btn btn-primary">Добавить продукты</button>
        </form>';

            return Response($output);
           // return $output;
        }
    }

}
