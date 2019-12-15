@extends("layout")

@section("app-title", "Персонажі")
@section("page-title", "Персонажі")

@section("page-content")
    <a href="/groups/create" class="btn btn-outline-success float-left"
        style="">Додати персонажа</a>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Ім'я</th>
                <th scope="col">Клас</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->number }}</td>
                    <td>{{ $group->speciality }}</td>
                    <td><a href="/groups/{{$group->id}}"
                            class="btn btn-outline-secondary">Переглянути</a>
                        <a href="/groups/{{$group->id}}"
                           class="btn btn-outline-info">Гравці</a>
                        <a href="/groups/{{$group->id}}/edit"
                            class="btn btn-outline-primary">Редагувати</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection