<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fitness extends Model
{
    protected $fillable = ['growth','starting_weight','age','gender','user_id','current_weight','exercise_stress','without_changing_the_weight','weight_loss','rapid_weight_loss'];
//    public function my_exercise_stress($exercise_stress)
//    {
//        switch($exercise_stress)
//        {
//            case 1:
//                return "Нет физических нагрузок и сидячая работа";
//                break;
//            case 2:
//                return "Совершаю небольшие пробежки или делаю легкую гимнастику 1–3 раза в неделю";
//                break;
//            case 3:
//                return "Занимаюсь спортом со средними нагрузками 3–5 раз в неделю";
//                break;
//            case 4:
//                return "Полноценно тренируюсь 6–7 раз в неделю";
//                break;
//            case 5:
//                return "Моя работа связана с физическим трудом,  тренируюсь 2 раза в день и включаю в программу тренировок силовые упражнения";
//                break;
//        }
//    }
//    public function PFC($calories) // PFC -proteins fats carbohydrates
//    {
//        $proteins = (($calories*45)/100)/4;
//        $fats = (($calories*25)/100)/9;
//        $carbohydrates = (($calories*30)/100)/4;
//        return  [
//            'proteins' => round($proteins,2),
//            'fats' => round($fats,2),
//            'carbohydrates' => round($carbohydrates,2)
//        ];
//
//    }
}
