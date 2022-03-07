@extends('app')

@section('content')
    <div class="container w-25 mt-5 border p-4">
        <form action="{{ route('empleados') }}" method="POST">
            @csrf
            @if(session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('name')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            @error('lastname')
            <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastname" id="lastname">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoria del empleado</label>
                <select name="category_id" id="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div>
            @foreach($empleados as $empleado)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('empleados-edit', ['id' => $empleado->id]) }}">{{ $empleado->name}} {{$empleado->lastname }}</a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('empleados-destroy', [$empleado->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

@endsection
