@extends("layout")

@section("app-title", "Персонажі")
@section("page-title", "Додати персонажа")

@section("page-content")
    <form method="post" action="/groups" class="text-left">
        {{ csrf_field() }}
        <div class="form-group">
            @include("includes/input", [
                    'fieldId' => 'number', 'labelText' => 'Ім\'я персонажа', 
                    'placeHolderText' => 'Введіть ім\'я'
            ])
        </div>
        <div class="form-group">
            @include("includes/input", [
                    'fieldId' => 'speciality', 'labelText' => 'Клас', 
                    'placeHolderText' => 'Клас персонажа'
            ])   
        </div>
        <div class="form-group">
        <label for="student">Активний гравець</label>
            <select class="browser-default custom-select"
                   name="student_id" id="student">
            <option selected disabled value="0">Оберіть гравця</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach                          
            </select>
            <small class="form-text form-danger">
                <ul>
                    @foreach($errors->get('student_id') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </small>
            <button type="submit" class="btn btn-primary float-right">Додати</button>
            <div class="clearfix"></div>  
        </div>
    </form>
@endsection