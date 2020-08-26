<?php


namespace App\Http\Services;


class СaloriesCalculator
{
    static public function calculateCalories($growth,$weight,$age,$gender,$exercise_stress)
    {
        $exercise_stress_coefficient = 0;
        switch($exercise_stress)
        {
            case 1:
                $exercise_stress_coefficient = 1.2;
                break;
            case 2:
                $exercise_stress_coefficient = 1.375;
                break;
            case 3:
                $exercise_stress_coefficient = 1.55;
                break;
            case 4:
                $exercise_stress_coefficient = 1.725;
                break;
            case 5:
                $exercise_stress_coefficient = 1.9;
                break;
        }
        if($gender == "male")
        {
            return ((10*$weight) + (6.25*$growth) - (5*$age) + 5)*$exercise_stress_coefficient;
        }
        elseif($gender == "female")
        {
            return ((10*$weight) + (6.25*$growth) - (5*$age) - 161)*$exercise_stress_coefficient;
        }

    }
    public static function my_exercise_stress($exercise_stress)
    {
        switch($exercise_stress)
        {
            case 1:
                return "Нет физических нагрузок и сидячая работа";
                break;
            case 2:
                return "Совершаю небольшие пробежки или делаю легкую гимнастику 1–3 раза в неделю";
                break;
            case 3:
                return "Занимаюсь спортом со средними нагрузками 3–5 раз в неделю";
                break;
            case 4:
                return "Полноценно тренируюсь 6–7 раз в неделю";
                break;
            case 5:
                return "Моя работа связана с физическим трудом,  тренируюсь 2 раза в день и включаю в программу тренировок силовые упражнения";
                break;
        }
    }
    public static function PFC($calories) // PFC -proteins fats carbohydrates
    {
        $proteins = (($calories*45)/100)/4;
        $fats = (($calories*25)/100)/9;
        $carbohydrates = (($calories*30)/100)/4;
        $data[0] = [
            'name' => 'Без потери веса',
            'calories' => $calories,
            'proteins' => round($proteins,2),
            'fats' => round($fats,2),
            'carbohydrates' => round($carbohydrates,2)
        ];
        $calories = $calories-550;
        $proteins = (($calories*45)/100)/4;
        $fats = (($calories*25)/100)/9;
        $carbohydrates = (($calories*30)/100)/4;
        $data[1] = [
            'name' => 'Похудение',
            'calories' => $calories,
            'proteins' => round($proteins,2),
            'fats' => round($fats,2),
            'carbohydrates' => round($carbohydrates,2)
        ];
        $calories = $calories-900;
        $proteins = (($calories*45)/100)/4;
        $fats = (($calories*25)/100)/9;
        $carbohydrates = (($calories*30)/100)/4;
        $data[2] = [
            'name' => 'Быстрое похудение',
            'calories' => $calories,
            'proteins' => round($proteins,2),
            'fats' => round($fats,2),
            'carbohydrates' => round($carbohydrates,2)
        ];
//        return  [
//            'calories' => $calories,
//            'proteins' => round($proteins,2),
//            'fats' => round($fats,2),
//            'carbohydrates' => round($carbohydrates,2)
//        ];
        return $data;

    }

}
