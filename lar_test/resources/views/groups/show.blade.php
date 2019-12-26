@extends("layout")

@section("app-title", "Персонажі")
@section("page-title", "Перегляд даних персонажа")

@section("page-content")
    <h2 class="text-info">Ім'я персонажа {{ $group->number }}</h2>
    <h5>Клас {{ $group->speciality }}</h5>
    <h4>Прив'язаний до гравця {{ $group->student->name }}</h4>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Зброя</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>Unkempt Harold</td>
                    <td>Pistol</td>
                    <td>
                        <a href="/groups/4/edit" class="btn btn-outline-primary">Видалити</a>
                    </td>
                </tr>
                    </tbody>
    </table>
    <br>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Щити</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>The Sham</td>
                    <td>Consuming</td>
                    <td>
                        <a href="/groups/4/edit" class="btn btn-outline-primary">Видалити</a>
                    </td>
                </tr>            
        </tbody>
    </table>
    <a href="/groups" class="btn btn-outline-info">Повернутися до списку</a>
@endsection