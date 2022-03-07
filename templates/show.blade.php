@extends('app')

@section('content')

    <div class="container w-25 border p-4">
        <div class="row mx-auto">
            <form  action="{{ route('empleados-update', ['id' => $empleado->id]) }}" method="POST" >
                @method('PATCH')
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
                <div class="mb-3 col">

                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control mb-2" name="name" id="name" value="{{ $empleado->name }}">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control mb-2" name="lastname" id="lastname" value="{{ $empleado->lastname }}">
                    <input type="submit" value="Update Employee" class="btn btn-primary my-2" />
                </div>
            </form>
        </div>
    </div>
@endsection
