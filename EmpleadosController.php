<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Empleado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required'],
            'lastname' => ['required'],
        ]);

        $empleado = new Empleado();
        $empleado->name = $request->input('name');
        $empleado->lastname = $request->input('lastname');
        $empleado->category_id = $request->category_id;
        $empleado->save();

        return redirect()->route('empleados')->with('success', 'Empleado creado correctamente');
    }

    public function index() {
        $empleados = Empleado::all();
        $categories = Category::all();
        return view('templates.index', ['empleados' => $empleados, 'categories' => $categories]);
    }

    public function show($id) {
        $empleado = Empleado::find($id);
        return view('templates.show', ['empleado' => $empleado]);

    }

    public function update(Request $request, $id) {
        $empleado = Empleado::find($id);
        $empleado->name = $request->name;
        $empleado->lastname = $request->lastname;
        $empleado->save();
        //return view('templates.index', ['success' => 'Empleado actualizado']);
        return redirect()->route('empleados')->with('success', 'Empleado actualizado');
    }

    public function destroy($id) {
        $empleado = Empleado::find($id);
        $empleado->delete();
        return redirect()->route('empleados')->with('success', 'Empleado eliminado correctamente');
    }
}
