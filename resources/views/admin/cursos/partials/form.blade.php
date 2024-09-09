<!-- Campo: Placa -->
<div class="mb-3">
    <label for="editVehiculoPlaca" class="form-label">{{ __('Placa') }}</label>
    <input type="text" class="form-control" id="editVehiculoPlaca" name="placa" readonly>
</div>

<!-- Campo: Nombre -->
<div class="mb-3">
    <label for="editVehiculoNombre" class="form-label">{{ __('Nombre del Vehículo') }}</label>
    <input type="text" class="form-control" id="editVehiculoNombre" name="nombre" required>
</div>

<!-- Campo: Modelo -->
<div class="mb-3">
    <label for="editVehiculoModelo" class="form-label">{{ __('Modelo') }}</label>
    <input type="text" class="form-control" id="editVehiculoModelo" name="modelo" required>
</div>

<!-- Campo: Tipo de Vehículo -->
<div class="mb-3">
    <label for="editVehiculoTipo" class="form-label">{{ __('Tipo de Vehículo') }}</label>
    <select id="editVehiculoTipo" name="tipo" class="form-control" required>
        @php
            $tipos = ['automovil', 'motocicleta', 'camioneta'];
        @endphp
        @foreach ($tipos as $value)
            <option value="{{ $value }}">{{ ucfirst($value) }}</option>
        @endforeach
    </select>
</div>


<!-- JavaScript para limpiar el formulario al cerrar el modal -->
{{-- @section('js')
    <script>
        $(document).ready(function() {
            // Limpiar el formulario de creación cuando se cierra el modal
            $('#createVehiculoModal').on('hidden.bs.modal', function() {
                $('#createVehiculoForm')[0].reset(); // Restablece el formulario al estado inicial
            });
        });
    </script>
@endsection --}}
