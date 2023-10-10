<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    /*
        -index para mostrar los datos
        -store para guardar un todo
        -update para actualizar un todo
        -destroy para eliminar un todo
        -edit mostrar el form de edicion
    */
    //insert
    public function store(Request $request){
        //validamos
        $request->validate([
            'title' => 'required|min:3'
        ]);
        //creamos el objeto y asignamos los valores
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->save();
        //redirigimos el usuario a la ruta todos
        return redirect()->route('todos')->with('success', 'Tarea creada satisfactoriamnete');
    }

    //consulta
    public function index(){
        $todos = Todo::all();
        $categories = Category::all();
        return view('todos.index', ['todos' => $todos, 'categories' => $categories]);
    }

    
    public function show($id){
        $todo = Todo::find($id);
        //$categories = Category::all();
    return view('todos.show', ['todo' => $todo/*, 'categories' => $categories*/]);
    }

    public function update(Request $request, $id){
        $todo = Todo::find($id);
        
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('todos')->with('success', 'Tarea Actualizado con exito');
    }

    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todos')->with('success', 'Tarea Eliminado con exito');
    }
}
