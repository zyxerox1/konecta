@extends("layouts.layouts")
@section('tittle', 'ventas')
@section('script', 'ventas/index.js')

@section('content')
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

    @if(isset($productos))
    <div class="row">
        <form action="{{ route('ventas.crear') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_producto" value="{{ $productos->id }}">
            <input type="hidden" name="cantidad" value="{{ $cantidad }}">

                <center><h2>¿Confirma esta venta? - Ref: {{$productos->referencia}}<h2></center>
                <h5>Producto: {{$productos->nombre_producto}}<h5>
                <h5>Cantidad: {{$cantidad}}<h5>
                <h5>Valor por unidad: {{$productos->precio}} - Valor total: {{$productos->precio*$cantidad}}<h5>
            <hr>
            <button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
            <button type="submit" class="btn btn-success" id="guardar">Confirmas</button>
        </form>
    </div>
    @endif

    <div class="container">
        <hr>
        <div class="card">
            <div class="card-header card-header-primary text-center card-desplegue">
                <a class="tittle-card titulo-deplegue">
                    <i class="fas fa-database"></i> Historial de ventas <i class="fas fa-chevron-up desplegue-btn"></i>
                </a>
            </div>
            <div class="divDesplegableContainer">
                <div class="card-body card-body-primary">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="data_ventas"
                                class="table table-bordred table-striped table-hover nowrap dt-responsive">
                                <thead class="heade-table">
                                    <th class="text-color all">Nombre</th>
                                    <th class="text-color all">Cantidad</th>
                                    <th class="text-color ">Fecha de la venta</th>
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

@endsection
