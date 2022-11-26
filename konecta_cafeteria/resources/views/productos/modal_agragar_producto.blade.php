
<div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="modalAgregar" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tittle">Agregar producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('producto.crear') }}" id="formulario-crear-producto" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Nombre_del_producto" class="text-color">Nombre del producto</label>
                            <input type="text" class="form-control @error('Nombre_del_producto') is-invalid @enderror" id="Nombre_del_producto" name="Nombre_del_producto"  
                            value="{{old('Nombre_del_producto')}}">
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
                            <input type="text" class="form-control validar-control @error('Referencia') is-invalid @enderror" id="Referencia" name="Referencia"  
                            value="{{old('Referencia')}}">
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
                            <input type="Number" class="form-control validar-control @error('Precio') is-invalid @enderror" id="Precio" name="Precio"  
                            value="{{old('Precio')}}">
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
                            <input type="Number" class="form-control validar-control @error('Peso') is-invalid @enderror" id="Peso" name="Peso"  
                            value="{{old('Peso')}}">
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
                            value="{{old('Categoria')}}">
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
                            <input type="number" class="form-control validar-control @error('Stock') is-invalid @enderror" id="Stock" name="Stock"  
                            value="{{old('Stock')}}"
                            >
                            @error('Stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>

            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" id="guardar">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  
  