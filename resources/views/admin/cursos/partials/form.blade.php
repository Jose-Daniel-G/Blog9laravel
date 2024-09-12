   <!-- Campo: Nombre -->
    <div class="mb-3">
        <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
        <input type="text" class="form-control" id="nombre" name="nombre"
            value="{{ $curso->nombre }}" required>
    </div>

    <!-- Campo: Descripcion -->
    <div class="mb-3">
        <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion"
            value="{{ $curso->descripcion }}" required>
    </div>

    <!-- Campo: Horas -->
    <div class="mb-3">
        <label for="horas_requeridas" class="form-label">{{ __('Horas Requeridas') }}</label>
        <input type="number" class="form-control" id="horas_requeridas" name="horas_requeridas"
            value="{{ $curso->horas_requeridas }}" min="0" step="0.01" placeholder="Ingrese las horas requeridas" required>
        <small id="horasHelp" class="form-text text-muted">Ingrese las horas en formato decimal, por ejemplo, 1.5 para una hora y media.</small>
    </div>

