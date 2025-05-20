@extends('templates.base')
@section('title','Crear Orden')
@section('header','Crear Orden')
@section('content')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="" method="POST">
            @csrf
            <div class="row form-group">
                <div class="col-lg-12 mb-4">
                    <label for="date">Fecha legalizacion</label>
                    <input type="date" class="form-control" name="date" id="date" required>
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
                    <div class="row form-group">
                        <label for="causal_id">Causal</label>
                         <input type="text" class="form-control" name="causal" id="causal" required>
                    </div>
                     <div class="col-lg-12 mb-4">
                    <label for="observation_id">Observacion</label>
                    <select name="observation_id" id="observation_id" class="form-control">
                        <option value="">Seleccione</option>
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
        </div>
    </div>

@endsection 
