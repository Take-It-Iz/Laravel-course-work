@extends("layout")

@section("app-title")
    Список гравців
@endsection

@section("page-title")
    Перегляд данних гравця
@endsection

@section("page-content")
    <h2>Гравець {{ $student->name }}</h2>
    <h5>Персонаж {{ $student->group->number }}</h5>
    <a href="/group/0/students" style="margin-top: 30px;"
        class="btn btn-outline-info">Повернутися до списку</a>
@endsection