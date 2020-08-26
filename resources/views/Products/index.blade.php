@extends('layouts.app')
@section('title-block') Список продуктов @endsection
@section('content')
    <products-component></products-component>
{{--    <form method="POST" enctype="multipart/form-data" action="{{ route('product.store') }}">--}}
{{--        @csrf--}}
{{--        <div class="form-row">--}}
{{--            <div class="form-group col-md-12">--}}
{{--                <label for="growth">Название продукта</label>--}}
{{--                <input type="text" class="form-control" id="name" name="name" placeholder="Название продукта">--}}
{{--            </div>--}}
{{--            <div class="form-group col-md-3">--}}
{{--                <label for="calories">Калории</label>--}}
{{--                <input type="text" class="form-control" id="calories" name="calories" placeholder="Калории">--}}
{{--            </div>--}}
{{--            <div class="form-group col-md-3">--}}
{{--                <label for="proteins">Белки</label>--}}
{{--                <input type="text" class="form-control" id="proteins" name="proteins" placeholder="Белки">--}}
{{--            </div>--}}
{{--            <div class="form-group col-md-3">--}}
{{--                <label for="fats">Жиры</label>--}}
{{--                <input type="text" class="form-control" id="fats" name="fats" placeholder="Жиры">--}}
{{--            </div>--}}
{{--            <div class="form-group col-md-3">--}}
{{--                <label for="carbohydrates">Углеводы</label>--}}
{{--                <input type="text" class="form-control" id="carbohydrates" name="carbohydrates" placeholder="Углеводы">--}}
{{--            </div>--}}
{{--            <button class="btn btn-primary">Добавить</button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--    <div class="container">--}}
{{--        <h1 class="text-center">Список продуктов</h1>--}}
{{--        <table class="table table-hover">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>#</th>--}}
{{--                <th>Название</th>--}}
{{--                <th>Калории</th>--}}
{{--                <th>Белки (на 100гр)</th>--}}
{{--                <th>Жиры (на 100гр)</th>--}}
{{--                <th>Углеводы (на 100гр)</th>--}}

{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($products as $product)--}}
{{--            <tr>--}}
{{--                <td>{{ $product->id }}</td>--}}
{{--                <td>{{ $product->name }}</td>--}}
{{--                <td>{{ $product->calories }}</td>--}}
{{--                <td>{{ $product->proteins }}</td>--}}
{{--                <td>{{ $product->fats }}</td>--}}
{{--                <td>{{ $product->carbohydrates }}</td>--}}
{{--            </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}

@endsection
