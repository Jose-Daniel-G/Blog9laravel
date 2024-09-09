<div class="modal fade" id="modal-{{ $curso->id }}" tabindex="-1" aria-labelledby="editCursoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCursoModalLabel">Editar Vehículo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editCursoForm" action="{{ route('admin.cursos.update', $curso->id ) }}" autocomplete="off" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.cursos.partials.form')
                    <button type="submit" class="btn btn-primary me-2">Actualizar Curso</button>
                </form>
            </div>
        </div>
    </div>
</div>
