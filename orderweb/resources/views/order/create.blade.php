@extends('templates.base')
@section('title','Crear Orden')
@section('header','Crear Orden')
@section('content')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <div class="row form-group">
                <div class="col-lg-12 mb-4">
                    <label for="legalization_date">Fecha legalizacion</label>
                    <input type="date" class="form-control" name="legalization_date" id="legalization_date" required>
                </div>
                <div class="col-lg-12 mb-4">
                    <label for="address">Direccion</label>
                    <input type="text" class="form-control" name="address" id="address" required>
                </div>

            </div>
            <div class="row form-group">
                <div class="col-lg-12 mb-4">
                    <label for="City">City</label>
                    <select name="city" id="city" class="form-control">
                        <option value="Tulua">Tulua</option>
                        <option value="Cali">Cali</option>
                        <option value="Buga">Buga</option>
                        <option value="Palmira">Palmira</option>
                    </select>
                      </div>
                    <div class="col-lg-6 mb-4">
                        <label for="causal_id">Causal</label>
                        <select name="causal_id" id="causal_id" class="form-control">
                            <option value="">Seleccione</option>
                            @foreach ($causals as $causal)
                                <option value="{{ $causal['id'] }}">{{ $causal['description'] }}</option>
                            @endforeach
                        </select>
                    </div>
                     <div class="col-lg-12 mb-4">
                    <label for="observation_id">Observacion</label>
                    <select name="observation_id" id="observation_id" class="form-control">
                        <option value="">Seleccione</option>
                         @foreach ($observations as $observation)
                                <option value="{{ $observation['id'] }}">{{ $observation['description'] }}</option>
                            @endforeach
                    </select>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary btn-block"> Guardar</button>
                </div>
                <div  class="col-lg-6">
                     <a href="{{ route('observation.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                </div>
            </div>
            </form>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="alert alert-warning" role="alert">
                        <i class="fa-solid fa-lightbulb"></i>Para añadir actividades a la orden, 
                        primero debe crearla y luego dar click en la accion editar
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection 
