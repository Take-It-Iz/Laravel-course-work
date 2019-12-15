@extends("layout")

@section("app-title", "Список гравців")
@section("page-title", "Редагування гравця")

@section("page-content")
    <form method="post" action="/group/{{ $group_filter_id }}/students/{{ $student->id }}"
        class="text-left">
        {{csrf_field()}}
        {{method_field("put")}}
        <div class="form-group">
            @include("includes/input", [
                'fieldId' => 'stud-name', 
                'labelText' => 'Прізвище', 
                'placeHolderText' => "Введіть ім'я", 
                'fieldValue' => $student->name            
            ])
        </div>
        <div class="form-group">
            <label for="stud-group">Група</label>
            <select class="browser-default custom-select" name="stud-group" id="stud-group">
                <option selected disabled value="0">Оберіть групу</option>    
                    @foreach($groups as $group)
                        <option @if($student->group->id == $group->id) selected @endif 
                            value="{{ $group->id }}">{{ $group->number }}</option>
                    @endforeach
            </select>
            @include('includes/validationErr', ['errFieldName' => "stud-group"])
        </div>
        <button type="submit" class="btn btn-primary float-right">
            Змінити
        </button>
        <button type="button" class="btn btn-danger" data-toggle="modal"
            data-target="#deleteModal">
            Видалити
        </button>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
        aria-tableledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">
                        <p>Підтвердіть видалення студента</p>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    Видалити студента {{ $student->name }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary"
                        data-dismiss="modal">Hi</button>
                    <button type="button" class="btn btn-danger"
                        id="delete-student">Видалити</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#delete-student").click(function () {
                var id = {!! $student->id !!};
                $.ajax({
                    url: 'group/{{ $group_filter_id }}/students/' + id,
                    type: 'post',
                    data: {
                        _method: 'delete',
                        _token: "{!! csrf_token() !!}"
                    },

                    success:function(msg) {
                        location.href="group/{{ $group_filter_id }}/students";
                    }
                });
            });
        });
    </script>
@endsection
