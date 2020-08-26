@extends('layouts.app')
@section('title-block') CONTACTS @endsection
@section('content')
    <nutrition-component user={{ Auth::user()->id }}></nutrition-component>
{{--<h1 class="text-center">Моё питание за день</h1>--}}
{{--<form method="POST" enctype="multipart/form-data" action="{{ route('nutrition.store') }}">--}}
{{--    @csrf--}}
{{--    <div class="form-row">--}}
{{--        <span id="hiddenId"></span>--}}
{{--        <div class="form-group col-md-10">--}}
{{--            <label for="growth">Название продукта</label>--}}
{{--            <input type="text" class="form-control" id="name" name="name" placeholder="Название продукта">--}}
{{--        </div><div class="form-group col-md-2">--}}
{{--            <label for="weight">Грамм</label>--}}
{{--            <input type="text" class="form-control" id="weight" name="weight" placeholder="сколько грамм съел">--}}
{{--        </div>--}}
{{--        <div class="form-group col-md-3">--}}
{{--            <label for="calories">Калории</label>--}}
{{--            <input type="text" class="form-control" id="calories" name="calories" placeholder="Калории">--}}
{{--        </div>--}}
{{--        <div class="form-group col-md-3">--}}
{{--            <label for="proteins">Белки</label>--}}
{{--            <input type="text" class="form-control" id="proteins" name="proteins" placeholder="Белки">--}}
{{--        </div>--}}
{{--        <div class="form-group col-md-3">--}}
{{--            <label for="fats">Жиры</label>--}}
{{--            <input type="text" class="form-control" id="fats" name="fats" placeholder="Жиры">--}}
{{--        </div>--}}
{{--        <div class="form-group col-md-3">--}}
{{--            <label for="carbohydrates">Углеводы</label>--}}
{{--            <input type="text" class="form-control" id="carbohydrates" name="carbohydrates" placeholder="Углеводы">--}}
{{--        </div>--}}
{{--        <div class="form-group col-md-12" style="display:none;">--}}
{{--            <label for="id"></label>--}}
{{--            <input type="text" class="form-control" id="id" name="id">--}}
{{--        </div>--}}
{{--        <button class="btn btn-primary">Добавить</button>--}}
{{--    </div>--}}
{{--</form>--}}
{{--<button class="btn btn-primary" id="allProducts">Весь список продуктов</button>--}}
{{--<div id="products" >--}}
{{--</div>--}}
{{--<div class="container">--}}
{{--    <h1 class="text-center">Съеденное за сегодня {{ date('Y-m-d') }}</h1>--}}
{{--    <table class="table table-hover">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Название</th>--}}
{{--            <th>Калории</th>--}}
{{--            <th>Белки (на 100гр)</th>--}}
{{--            <th>Жиры (на 100гр)</th>--}}
{{--            <th>Углеводы (на 100гр)</th>--}}
{{--            <th>Вес</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @if(isset($products))--}}
{{--        @foreach($products as $product)--}}
{{--            <tr>--}}
{{--                <td>{{$product->name}}</td>--}}
{{--                <td>{{round($product->calories*($product->pivot->weight/100),2)}}</td>--}}
{{--                <td>{{round($product->proteins*($product->pivot->weight/100),2)}}</td>--}}
{{--                <td>{{round($product->fats*($product->pivot->weight/100),2)}}</td>--}}
{{--                <td>{{$product->carbohydrates*($product->pivot->weight/100)}}</td>--}}
{{--                <td>{{$product->pivot->weight}}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        <tr style="border: 3px solid red;">--}}
{{--            <td>{{$total['name']}}</td>--}}
{{--            <td>{{$total['calories']}}</td>--}}
{{--            <td>{{$total['proteins']}}</td>--}}
{{--            <td>{{$total['fats']}}</td>--}}
{{--            <td>{{$total['carbohydrates']}}</td>--}}
{{--            <td></td>--}}
{{--        </tr>--}}
{{--            @endif--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--</div>--}}
{{--<script type="text/javascript">--}}
{{--    $('#allProducts').on('click',function() {--}}
{{--       console.log('Кнопка нажата');--}}
{{--       $.ajax({--}}
{{--            type: 'get',--}}
{{--            url: '{{URL::to('allProducts')}}',--}}
{{--           success:function(data){--}}
{{--                console.log(data);--}}
{{--               $('#products').html(data);--}}

{{--           }--}}
{{--       });--}}
{{--    });--}}
{{--    $('#name').on('keyup',function(){--}}
{{--        console.log($(this).val());--}}
{{--        let value=$(this).val();--}}
{{--        $.ajax({--}}
{{--            type : 'get',--}}
{{--            url : '{{URL::to('search')}}',--}}
{{--            data:{'search':value},--}}
{{--            success:function(data){--}}
{{--                let productId = data.id--}}
{{--                $('#hiddenId').append('<input type="text" class="form-control" id="id" name="id" value="{{ productId }}" placeholder="Название продукта">');--}}
{{--                $('#calories').val(data.calories);--}}
{{--                $('#proteins').val(data.proteins);--}}
{{--                $('#fats').val(data.fats);--}}
{{--                $('#carbohydrates').val(data.carbohydrates);--}}
{{--                $('#id').val(data.id);--}}
{{--                console.log(data.name);--}}

{{--            }--}}
{{--        });--}}
{{--    })--}}
{{--</script>--}}
{{--<script type="text/javascript">--}}
{{--    // $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });--}}
{{--    $.ajaxSetup({ data: {"_token": "{{ csrf_token() }}"} });--}}

{{--</script>--}}
@endsection
