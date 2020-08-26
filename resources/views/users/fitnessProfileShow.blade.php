@extends('layouts.app')
@section('title-block') Мой профиль @endsection
@section('content')
    <fitness-profile-show-component user={{ Auth::user()->id }}></fitness-profile-show-component>
    <chart-line-component user={{ Auth::user()->id }}></chart-line-component>
{{--    <div class="container">--}}
{{--        <h1 class="text-center">Моя статистика</h1>--}}
{{--        <table class="table table-hover">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Возраст</th>--}}
{{--                <th>Рост</th>--}}
{{--                <th>Начальный вес</th>--}}
{{--                <th>Текущий вес</th>--}}
{{--                <th>Вес не менется</th>--}}
{{--                <th>Похудение</th>--}}
{{--                <th>Быстрое похудение</th>--}}
{{--                <th>Как часто занимаюсь</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            <tr>--}}
{{--                <td>{{ $data->age }}</td>--}}
{{--                <td>{{ $data->growth }}</td>--}}
{{--                <td>{{ $data->starting_weight }} Кг.</td>--}}
{{--                <td>{{ $data->current_weight }} Кг.</td>--}}
{{--                <td>{{ $data->without_changing_the_weight }} Каллорий</td>--}}
{{--                <td>{{ $data->weight_loss }} Каллорий</td>--}}
{{--                <td>{{ $data->rapid_weight_loss }} Каллорий</td>--}}
{{--                <td>{{ $data->my_exercise_stress($data->exercise_stress) }}</td>--}}
{{--            </tr>--}}
{{--            </tbody>--}}
{{--        </table>--}}

{{--        <div class="container" style="margin-top:100px;">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm">--}}
{{--                    <h2>Вес не меняется</h2>--}}
{{--                    <table class="table table-hover">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>Белки</th>--}}
{{--                            <th>Жири</th>--}}
{{--                            <th>Углеводы</th>--}}

{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <td>{{ $data->PFC($data->without_changing_the_weight)['proteins'] }} Грамм.</td>--}}
{{--                            <td>{{ $data->PFC($data->without_changing_the_weight)['fats'] }} Грамм.</td>--}}
{{--                            <td>{{ $data->PFC($data->without_changing_the_weight)['carbohydrates'] }} Грамм.</td>--}}

{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--                <div class="col-sm">--}}
{{--                    <h2>Похудение</h2>--}}
{{--                    <table class="table table-hover">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>Белки</th>--}}
{{--                            <th>Жири</th>--}}
{{--                            <th>Углеводы</th>--}}

{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <td>{{ $data->PFC($data->weight_loss)['proteins'] }} Грамм.</td>--}}
{{--                            <td>{{ $data->PFC($data->weight_loss)['fats'] }} Грамм.</td>--}}
{{--                            <td>{{ $data->PFC($data->weight_loss)['carbohydrates'] }} Грамм.</td>--}}

{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--                <div class="col-sm">--}}
{{--                    <h2>Быстрое похудение</h2>--}}
{{--                    <table class="table table-hover">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>Белки</th>--}}
{{--                            <th>Жири</th>--}}
{{--                            <th>Углеводы</th>--}}

{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <td>{{ $data->PFC($data->rapid_weight_loss)['proteins'] }} Грамм.</td>--}}
{{--                            <td>{{ $data->PFC($data->rapid_weight_loss)['fats'] }} Грамм.</td>--}}
{{--                            <td>{{ $data->PFC($data->rapid_weight_loss)['carbohydrates'] }} Грамм.</td>--}}

{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
