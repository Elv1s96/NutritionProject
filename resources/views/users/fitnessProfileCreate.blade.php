@extends('layouts.app')
@section('title-block') CONTACTS @endsection
@section('content')
<form method="POST" enctype="multipart/form-data" action="{{ route('fitness.store') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="growth">Рост</label>
            <input type="text" class="form-control" id="growth" name="growth" placeholder="Рост">
        </div>
        <div class="form-group col-md-6">
            <label for="starting_weight">Вес</label>
            <input type="text" class="form-control" id="starting_weight" name="starting_weight" placeholder="Вес">
        </div>

        <div class="form-group col-md-6">
            <label for="age">Возраст</label>
            <input type="text" class="form-control" id="age" name="age" placeholder="Возраст">
        </div>
        <div class="form-group col-md-6">
            <label for="gender">Пол</label>
            <select id="gender" name="gender" class="form-control">
                <option value="male" selected>Мужчина</option>
                <option value="female" >Женщина</option>
            </select>
        </div>
        <div class="form-group col-md-8">
            <label for="gender">Как часто занимаетесь в течении недели</label>
            <select id="gender" name="exercise_stress" class="form-control">
                <option value="1">Нет физических нагрузок и сидячая работа</option>
                <option value="2">Совершаете небольшие пробежки или делаете легкую гимнастику 1–3 раза в неделю</option>
                <option value="3">Занимаетесь спортом со средними нагрузками 3–5 раз в неделю</option>
                <option value="4">Полноценно тренируетесь 6–7 раз в неделю</option>
                <option value="5">Ваша работа связана с физическим трудом, вы тренируетесь 2 раза в день и включаете в программу тренировок силовые упражнения</option>
            </select>
        </div>
    </div>
    <button class="btn btn-primary">Создать</button>
</form>
@endsection
