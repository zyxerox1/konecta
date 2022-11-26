
@extends("layouts.layouts")
@section('tittle', 'productos')
@section('script', 'producto/aditar.js')

@section('content')
   
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<center><h2>Id: {{$productos->id}}</h2></center>
<hr>
<form action="{{ route('producto.update',$productos->id) }}" id="formulario-actualizar-producto" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="Nombre_del_producto" class="text-color">Nombre del producto</label>
                <input type="text" class="form-control @error('Nombre_del_producto') is-invalid @enderror" id="Nombre_del_producto" name="Nombre_del_producto" required="required" 
                value="{{$productos->nombre_producto}}">
                @error('Nombre_del_producto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="Referencia" class="text-color">Referencia</label>
                <input type="text" class="form-control validar-control @error('Referencia') is-invalid @enderror" id="Referencia" name="Referencia" required="required"
                value="{{$productos->referencia}}">
                @error('Referencia')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="Precio" class="text-color">Precio</label>
                <input type="Number" class="form-control validar-control @error('Precio') is-invalid @enderror" id="Precio" name="Precio" required="required"
                value="{{$productos->precio}}">
                @error('Precio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="Peso" class="text-color">Peso</label>
                <input type="Number" class="form-control validar-control @error('Peso') is-invalid @enderror" id="Peso" name="Peso" required="required"
                value="{{$productos->peso}}">
                @error('Peso')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="Categoria" class="text-color">Categoría</label>
                <input type="text" class="form-control validar-control" id="Categoria" name="Categoria" required="required @error('Categoria') is-invalid @enderror" 
                value="{{$productos->categoria}}">
                @error('Categoria')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="Stock" class="text-color">Stock</label>
                <input type="number" class="form-control validar-control @error('Stock') is-invalid @enderror" id="Stock" name="Stock" required="required"
                value="{{$productos->stock}}"
                >
                @error('Stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

    </div>
    <hr>
    <button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
    <button type="submit" class="btn btn-success" id="guardar">Guardar</button>
</form>

@endsection