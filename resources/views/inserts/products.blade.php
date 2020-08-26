@isset($output)
<form method="get" enctype="multipart/form-data" action="/storeFromTable"><table class="table table-hover text-center mt-3" style="border: 3px solid gray;">
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
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$output->name}}</td>
                <td>{{$output->calories}}</td>
                <td>{{$output->proteins}}</td>
                <td>{{$output->fats}}</td>
                <td>{{$output->carbohydrates}}</td>
                <td><input type="text" class="form-check-input" id="weight" style="width:2%" name="weight_{{ $output->id }}"></td>
                <td><input type="checkbox" class="form-check-input " value="{{ $output->id }}" id="{{ $output->id }}" name="{{ $output->id }}"></td>
            </tr>
@endforeach
        </tbody>
    </table>
</form>
{{ $output->links() }}
@endisset
