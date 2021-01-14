<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Category;
use Illuminate\Support\Facades\Storage;

class ApplicatiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $id_usuario = auth()->user()->id;
      $aplicaciones = Application::where('user_id', $id_usuario)->latest()->paginate(10);
      return view('index', compact('aplicaciones'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::all();

        return view('create', compact('categorias'));
        //return redirect('/me/application/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Validación
      $validacion = [
          'Nombre' => 'required|string|max:200',
          'Descripcion' => 'string|max:200',
          'Precio' => 'required',
          'Foto' => 'required|max:10000|mimes:jpeg,png,jpg,bmp'
      ];

      $mensaje = [
          "required" => 'El campo :attribute es requerido',
          "string" => 'El campo :attribute debe ser un string',
          "max" => 'El campo :attribute no debe superar los :max caracteres',
          "mimes" => 'La fotografía debe ser formato jpeg, png, jpg o bmp'
      ];

      $this->validate($request, $validacion, $mensaje);

      $nuevaAplicacion = new Application();
      $nuevaAplicacion->name = $request['Nombre'];
      $nuevaAplicacion->description = $request['Descripcion'];
      $nuevaAplicacion->price = $request['Precio'];
      $nuevaAplicacion->category_id = $request['id_categoria'];
      $nuevaAplicacion->user_id = auth()->user()->id;
      if ($request->hasFile('Foto')) {
          $nuevaAplicacion->picture = $request->file('Foto')->store('uploads', 'public');
      }
      $nuevaAplicacion->save();

      return redirect('me/application');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categorias = Category::all();
      $aplicacion = Application::findOrFail($id);
      return view('edit', compact('aplicacion', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //Guarda en la variable todos los datos del formulario, excepto el token (csrf_field) y el método (method_field).
        $datosNuevos = request()->except(['_token', '_method']);

        if ($request->hasFile('picture')) {

            //Encontrar id y borrar fotografía anterior.
            $aplicacion = Application::findOrFail($id);
            Storage::delete('public/' . $aplicacion->picture);

            //Guardar fotografía nueva.
            //$datosNuevos['picture'] = $request->file('foto')->store('uploads', 'public');
            $datosNuevos['picture'] = $request->file('picture')->store('uploads', 'public');
            return $datosNuevos;
        }


        //Encontrar aplicacion por id.
        //Application::where('id', '=', $id)->update($datosNuevos);

        //Si queremos volver a la lista de aplicaciones
        return redirect('me/application')->with('Mensaje', 'Aplicacion modificada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Application::destroy($id);
      return response()->json('aplicacion borrada');
      //return redirect('me/application')->with('flash_message', '¡aplicación borrada!');
    }
}
