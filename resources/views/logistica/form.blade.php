<div class="row">

    <div class="col-sm-6">
 
                
        <div class="form-group row">
            <label for="proveedor" class="col-sm-4 col-form-label">Proveedor</label>
            <div class="col-sm-8"> 
                {{-- <input type="text" name="proveedor" class="form-control" value="1" id="proveedor"> --}}
                <select type="text" name="proveedor" class="form-control" id="proveedor">  
                    <option value="{{$proveedor->idproveedor}}">{{$proveedor->nombre_comercial}}</option>
                    @foreach ( $proveedores as $proveedor )
                        <option value="{{$proveedor->idproveedor}}">{{$proveedor->nombre_comercial}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
    
        <div class="form-group row">
            <label for="descripcion" class="col-sm-4 col-form-label">Gas</label>
            <div class="col-sm-8"> 
                <input type="text" name="descripcion" class="form-control" value="{{ isset($gas->descripcion)?$gas->descripcion:'' }}" id="descripcion">
            </div>
        </div>

        <div class="form-group row">
            <label for="peso" class="col-sm-4 col-form-label">Peso</label>
            <div class="col-sm-8">
                <select type="text" name="peso" class="form-control" id="peso">
                    <option value="{{ isset($gas->peso)?$gas->peso:'' }}">{{ isset($gas->peso)?$gas->peso:'' }} Kg</option>
                    <option value="10">10 Kg</option>
                    <option value="45">45 Kg</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="tipo" class="col-sm-4 col-form-label">Tipo</label>
            <div class="col-sm-8">
                <input type="text" name="tipo" class="form-control" value="{{ isset($gas->tipo)?$gas->tipo:'' }}" id="tipo">
            </div>
        </div>

        <div class="form-group row">
            <label for="precio" class="col-sm-4 col-form-label">Precio</label>
            <div class="col-sm-8">
                <input type="text" name="precio" class="form-control" value="{{ isset($gas->precio)?$gas->precio:'' }}" id="precio">
            </div>
        </div>

        <div class="form-group row">
            <label for="cantidad" class="col-sm-4 col-form-label">Cantidad</label>
            <div class="col-sm-8">
                <input type="text" name="cantidad" class="form-control" value="{{ isset($gas->cantidad)?$gas->cantidad:'' }}" id="cantidad">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="marca" class="col-sm-4 col-form-label">Marca</label>
            <div class="col-sm-8">
                <input type="text" name="marca" class="form-control" value="{{ isset($gas->marca)?$gas->marca:'' }}" id="marca">
            </div>
        </div>

        
    </div>  
    
    <div class="col-sm-6">
        <input class="btn btn-info" type="submit" value="Actualizar">
        
    </div>
 
</div>
