<div>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="card">
        {{-- cabecera tabla --}}
        <div class="card-header">
            <a class="btn btn-primary" href="{{url('/estudiante/create')}}">Registrar Estudiante</a>
        </div>
        
        <input type="hidden" value="{{ $i = 1 }}">

        @if ($estudiantes->count())
            {{-- cuerpo tabla --}}
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Nombre</td>
                            <td colspan="2">Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $estudiantes as $estudiante )
                        <tr>
                            <td>{{ $estudiante->idestudiante }}</td>
                            <td>{{ $estudiante->nombre }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ url('/estudiante/'.$estudiante->idestudiante.'/edit') }}">Editar</a>
                            </td>
                            <td>
                                <form action="{{ url('/estudiante/'.$estudiante->idestudiante) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('quieres borrar?')" value="Borrar">
                                </form>
                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                
            </div> 
            
        @else
            <div class="card-body">
                <h4>No se tiene registro en la BASE DATOS...</h4>
            </div>
        @endif
    </div>
</div>
