@extends("layout")

@section("app-title", "Персонажі")
@section("page-title", "Перегляд даних персонажів")

@section("page-content")
    <h2 class="text-info">Номер групи {{ $group->number }}</h2>
    <h5>Спеціальність {{ $group->speciality }}</h5>
    <h4>Староста групи {{ $group->student->name }}</h4>
    <a href="/groups" class="btn btn-outline-info">Повернутися до списку</a>
@endsection