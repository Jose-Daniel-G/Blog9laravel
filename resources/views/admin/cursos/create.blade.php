<div class="modal fade" id="createCursoModal" tabindex="-1" aria-labelledby="createCursoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCursoModalLabel">Crear nuevo Curso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createCursoForm" action="{{ route('admin.cursos.store') }}" autocomplete="off"
                    method="POST">
                    @csrf
                    <!-- Campo: Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="" required>
                    </div>

                    <!-- Campo: Descripcion -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion"
                            value="" required>
                    </div>

                    <!-- Campo: Horas -->
                    <div class="mb-3">
                        <label for="horas_requeridas" class="form-label">{{ __('Horas Requeridas') }}</label>
                        <input type="number" class="form-control" id="horas_requeridas" name="horas_requeridas"
                            value="{{ old('horas_requeridas') }}" min="0" step="0.01" placeholder="Ingrese las horas requeridas" required>
                        <small id="horasHelp" class="form-text text-muted">Ingrese las horas en formato decimal, por ejemplo, 1.5 para una hora y media.</small>
                    </div>


                    <button type="submit" class="btn btn-primary me-2">Crear vehículo</button>
                </form>
            </div>
        </div>
    </div>
</div>
