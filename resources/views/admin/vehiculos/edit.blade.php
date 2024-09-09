<div class="modal fade" id="editVehiculoModal" tabindex="-1" aria-labelledby="editVehiculoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editVehiculoModalLabel">Editar Vehículo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editVehiculoForm" action="{{ route('admin.vehiculos.update', ':id') }}" autocomplete="off" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.vehiculos.partials.form')
                    <button type="submit" class="btn btn-primary me-2">Actualizar vehículo</button>
                </form>
            </div>
        </div>
    </div>
</div>
