@extends("layout")

@section("app-title", "Список гравців")
@section("page-title", "Додати гравця")

@section("page-content")
    <form method="post" action="/group/{{ $group_filter_id }}/students" class="text-left">
        {{ csrf_field() }}
        <div class="form-group">
        @include("includes/input", [
                'fieldId' => 'stud-name', 'labelText' => 'Прізвище', 
                'placeHolderText' => "Введіть ім'я"            
            ])
        </div>
        <div class="form-group">
            <label for="stud-group">Персонаж</label>
            <select class="browser-default custom-select" name="stud-group" id="stud-group">
                <option selected disabled value="0">Оберіть персонажа</option>    
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}"
                            @if($group_filter_id == $group->id) selected @endif>
                            {{ $group->number }}
                        </option>
                    @endforeach
            </select>
            @include('includes/validationErr', ['errFieldName' => "stud-group"])
        </div>
        <button type="submit" class="btn btn-primary float-right">Додати</button>
        <div class="clearfix"></div>     
    </form>
@endsection