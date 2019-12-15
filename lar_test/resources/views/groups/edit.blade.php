@extends("layout")

@section("app-title", "Персонажі")
@section("page-title", "Додати персонажа")

@section("page-content")
    <form method="post" action="/groups/{{ $group->id }}" class="text-left">
        @csrf
        @method("patch")
        <div class="form-group">
            @include("includes/input", [
                    'fieldId' => 'number', 'labelText' => 'Номер групи', 
                    'placeHolderText' => 'Введіть номер',
                    'fieldValue' => $group->number
            ])
        </div>
        <div class="form-group">
            @include("includes/input", [
                    'fieldId' => 'speciality', 'labelText' => 'Спеціальність', 
                    'placeHolderText' => 'Назва спеціальності',
                    'fieldValue' => $group->speciality
            ])   
        </div>
        <div class="form-group">
        <label for="student">Староста групи</label>
            <select class="browser-default custom-select"
                   name="student_id" id="student">
            <option selected disabled value="0">Оберіть персонажа</option>
                    @foreach($students as $student)
                        <option @if($group->student->id == $student->id) selected @endif
                            value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach                          
            </select>
            @include('includes/validationErr', ['errFieldName' => "student_id"])
        </div>
        <button type="submit" class="btn btn-primary
            float-right">Змінити</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" 
            data-target="#deleteModal">Видалити</button>
    </form>

    <!-- MODAL -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">
                        <p>Підтвердіть видалення персонажа</p>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary"
                        data-dismiss="modal">Ні</button>
                    <button type="button" class="btn btn-danger"
                        id="delete-group">Видалити</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#delete-group").click(function() {
                var id = {{!! $group->id !!}};
                $ajax({
                    url: '/groups/' + id,
                    type: 'post',
                    data: {
                        _method: 'delete',
                        _token: "{{!! csrf_token() !!}}"
                    },
                    success:function(msg) {
                        location.href="/groups";
                    }
                });
            });
        });
    </script>
@endsection