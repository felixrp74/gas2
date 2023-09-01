<div class="row">

    <div class="col-sm-6">
    
        <div class="form-group row">
            <label for="dni" class="col-sm-4 col-form-label">DNI</label>
            <div class="col-sm-8">
                <input type="text" name="dni" class="form-control" value="{{ isset($reporteingresos[0]->dni)?$reporteingresos[0]->dni:'' }}" id="dni">
            </div>
        </div>

        <div class="form-group row">
            <label for="ruc" class="col-sm-4 col-form-label">RUC</label>
            <div class="col-sm-8">
                <input type="text" name="ruc" class="form-control" value="{{ isset($reporteingresos[0]->ruc)?$reporteingresos[0]->ruc:'' }}" id="ruc">
            </div>
        </div>

        <div class="form-group row">
            <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
            <div class="col-sm-8">
                <input type="text" name="nombre" class="form-control" value="{{ isset($reporteingresos[0]->nombre)?$reporteingresos[0]->nombre:'' }}" id="nombre">
            </div>
        </div>

        <div class="form-group row">
            <label for="apellido_paterno" class="col-sm-4 col-form-label">Apellido paterno</label>
            <div class="col-sm-8">
                <input type="text" name="apellido_paterno" class="form-control" value="{{ isset($reporteingresos[0]->apellido_paterno)?$reporteingresos[0]->apellido_paterno:'' }}" id="apellido_paterno">
            </div>
        </div>

        <div class="form-group row">
            <label for="apellido_materno" class="col-sm-4 col-form-label">Apellido materno</label>
            <div class="col-sm-8">
                <input type="text" name="apellido_materno" class="form-control" value="{{ isset($reporteingresos[0]->apellido_materno)?$reporteingresos[0]->apellido_materno:'' }}" id="apellido_materno">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="direccion" class="col-sm-4 col-form-label">Direccion</label>
            <div class="col-sm-8">
                <input type="text" name="direccion" class="form-control" value="{{ isset($reporteingresos[0]->direccion)?$reporteingresos[0]->direccion:'' }}"   id="direccion">
            </div>
        </div>

        <div class="form-group row">
            <label for="barrio" class="col-sm-4 col-form-label">Barrio</label>
            <div class="col-sm-8">
                <input type="text" name="barrio" class="form-control" value="{{ isset($reporteingresos[0]->barrio)?$reporteingresos[0]->barrio:'' }}" id="barrio">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="referencia" class="col-sm-4 col-form-label">Referencia</label>
            <div class="col-sm-8">
                <input type="text" name="referencia" class="form-control" value="{{ isset($reporteingresos[0]->referencia)?$reporteingresos[0]->referencia:'' }}" id="referencia">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="manzana" class="col-sm-4 col-form-label">Manzana</label>
            <div class="col-sm-8">
                <input type="text" name="manzana" class="form-control" value="{{ isset($reporteingresos[0]->manzana)?$reporteingresos[0]->manzana:'' }}" id="manzana">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="lote" class="col-sm-4 col-form-label">Lote</label>
            <div class="col-sm-8">
                <input type="text" name="lote" class="form-control" value="{{ isset($reporteingresos[0]->lote)?$reporteingresos[0]->lote:'' }}" id="lote">
            </div>
        </div>

    </div> 

















    
    <div class="col-sm-6">

        <div class="form-group row">
            <label for="tipo" class="col-sm-4 col-form-label">Tipo</label>
            <div class="col-sm-8">
                <select type="text" name="tipo" class="form-control" id="tipo">
                    {{-- @if(is_null($reporteingresos[0]->tipo)) --}}
                    <option value="{{$reporteingresos[0]->tipo}}">{{$reporteingresos[0]->tipo}}</option>
                    {{-- @endif  --}}
                    <option value="ROSCA">ROSCA</option>
                    <option value="PRESION">PRESION</option>
                    <option value="NORMAL">NORMAL</option>
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="marca" class="col-sm-4 col-form-label">Marca</label>
            <div class="col-sm-8">
                <select type="text" name="marca" class="form-control" id="marca">
                    <option value="{{$reporteingresos[0]->marca}}">{{$reporteingresos[0]->marca}}</option>
                    <option value="OXISOL">OXISOL</option>
                    <option value="NEWGAS">NEWGAS</option>
                    <option value="SOLGAS">SOLGAS</option>
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="peso" class="col-sm-4 col-form-label">Peso</label>
            <div class="col-sm-8">
                <select type="text" name="peso" class="form-control" id="peso">
                    <option value="{{$reporteingresos[0]->peso}}">{{$reporteingresos[0]->peso}} Kg</option>
                    <option value="10">10 Kg</option>
                    <option value="45">45 Kg</option>
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="cantidad" class="col-sm-4 col-form-label">Cantidad</label>
            <div class="col-sm-8">
                <input type="number" name="cantidad" class="form-control" value="{{ isset($reporteingresos[0]->cantidad)?$reporteingresos[0]->cantidad:'' }}" id="cantidad">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="precio" class="col-sm-4 col-form-label">Precio Unidad</label>
            <div class="col-sm-8">
                <input type="number" name="precio" class="form-control" value="60.50" id="precio">
            </div>
        </div>         
        
        <div class="form-group row">
            <label for="total" class="col-sm-4 col-form-label">Total</label>
            <div class="col-sm-8">
                <input type="text" name="total" class="form-control" value="{{ isset($reporteingresos[0]->cantidad)?$reporteingresos[0]->cantidad*$reporteingresos[0]->precio:'' }}" id="total">
            </div>
        </div>
        
        {{-- <input class="btn btn-warning" type="button" value="Calcular" onclick="calcular()"> --}}
        
        <input class="btn btn-info" type="submit" value="Guardar datos">
        <button class="btn btn-warning" onclick="calcular(); event.preventDefault();" pre >Calcular</button>
        
    </div>
</div>
