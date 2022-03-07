@extends('app')

@section('content')

    <div class="container w-25 border p-4">
        <div class="row mx-auto">
            <form  method="POST" action="{{route('categories.update',['category' => $category->id])}}">
                @method('PATCH')
                @csrf

                <div class="mb-3 col">

                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @error('color')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                    @endif

                    <label for="exampleFormControlInput1" class="form-label">Nombre de la categoría</label>
                    <input type="text" class="form-control mb-2" name="name" id="exampleFormControlInput1" placeholder="Hogar" value="{{ $category->name }}">

                    <label for="exampleColorInput" class="form-label">Escoge un color para la categoría</label>
                    <input type="color" class="form-control form-control-color" name="color" id="exampleColorInput" value="{{ $category->color }}" title="Choose your color">

                    <input type="submit" value="Actualizar tarea" class="btn btn-primary my-2" />
                </div>
            </form>

            <div >
                @if ($category->empleados->count() > 0)
                    @foreach ($category->empleados as $empleado )
                        <div class="row py-1">
                            <div class="col-md-9 d-flex align-items-center">
                                <a href="{{ route('empleados-edit', ['id' => $empleado->id]) }}">{{ $empleado->name }}</a>
                            </div>

                            <div class="col-md-3 d-flex justify-content-end">
                                <form action="{{ route('empleados-destroy', [$empleado->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    No hay empleados con esta categoría
                @endif
            </div>
        </div>
    </div>
@endsection
