@extends("layout")

@section("app-title")
    Гравці
@endsection

@section("page-title")
    {{ $pageTitle }}
@endsection

@section("page-content")
    <div class="form-group">
        <select class="browser-default custom-select"
            name="stud-group-filter" id="stud-group-filter">
            <option value="0">Всі персонажі</option>
            @foreach($groups as $group)
                <option 
                    @if($group->id==$group_filter_id) 
                    selected @endif value="{{$group->id}}">{{$group->number}}
                </option>
            @endforeach
        </select>   
        <script>
            $('#stud-group-filter').change(() => {
                var id = $('#stud-group-filter').val();
                var url = "/group/" + id + "/students";
                location.href = url;
            });
        </script>     
    </div> 
    <a href="/group/{{ $group_filter_id }}/students/create" class="btn btn-online-success float-left"
        style="margin-bottom: 10px;">Додати гравця</a>
        <table class="table table-stripped table-dark">
            <thead>
                <tr>
                    <th scope="col">Ім'я</th>
                    <th scope="col">Персонаж</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->group->number }}</td>
                    <td><a href="/group/{{ $group_filter_id }}/students/{{ $student->id }}"
                        class="btn btn-outline-secondary">Переглянути</a>              
                        <a href="/group/{{ $group_filter_id }}/students/{{ $student->id }}/edit"
                        class="btn btn-outline-primary">Редагувати</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>  
@endsection