@extends("layouts.layouts")
@section('tittle', 'productos')
@section('script', 'producto/index.js')

@section('content')
    @include('productos.modal_agragar_producto')
    @if ($errors->any())
    <div class="alert alert-danger" id="contenedor_errores">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session()->get('mensaje_correcto'))
        <div class="alert alert-success">
            {{ session()->get('mensaje_correcto') }}  
        </div>
    @endif


    @if(session()->get('err'))
        <div class="alert alert-danger">
            {{ session()->get('err') }}  
        </div>
    @endif
    <div class="row">
      
        <div class="col-md-4">
            <a type="button" id="Agregar" class="btn btn-primary btn_completo" data-toggle="modal" data-target="#modalAgregar">Agregar producto</a>
        </div>

        <div class="col-md-4">
            <a type="button" id="stock" class="btn btn-primary btn_completo">Producto que más stock tiene.</a>
        </div>

        <div class="col-md-4">
            <a type="button" id="vendido" class="btn btn-primary btn_completo">Producto más vendido.</a>
        </div>
        
    </div>

    <div class="container">
        <hr>
        <div class="card">
            <div class="card-header card-header-primary text-center card-desplegue">
                <a class="tittle-card titulo-deplegue">
                    <i class="fas fa-database"></i> Datos de productos <i class="fas fa-chevron-up desplegue-btn"></i>
                </a>
            </div>
            <div class="divDesplegableContainer">
                <div class="card-body card-body-primary">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="data_producto"
                                class="table table-bordred table-striped table-hover nowrap dt-responsive">
                                <thead class="heade-table">
                                    <th class="text-color all">Nombre</th>
                                    <th class="text-color all">Referencia</th>
                                    <th class="text-color all">Precio</th>
                                    <th class="text-color">Peso</th>                
                                    <th class="text-color all">Categoría</th>
                                    <th class="text-color all">Stock</th>
                                    <th class="text-color ">Fecha de creación</th>
                                    <th class="text-color all">Editar</th>
                                    <th class="text-color all">Eliminar</th>
                                    <th class="text-color all">Comprar</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="" method="post" id="formulario_eliminar">
        @csrf
        @method('DELETE')
    </form>
@endsection
