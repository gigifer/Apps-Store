<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Category;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\DB;

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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validacion = [
          'Nombre' => 'required|string|max:100',
          'Descripcion' => 'required|string|max:200',
          'Precio' => 'required',
          'Foto' => 'required|max:10000|mimes:jpeg,png,jpg,bmp'
      ];

      $mensaje = [
          "required" => 'El campo :attribute es requerido',
          "string" => 'El campo :attribute debe ser un texto',
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

      return redirect('me/application')->with('success', 'Aplicación creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //$categoria = DB::table('applications')
          //->join('categories', function ($join) use($id){
              //$join->on('applications.category_id', '=', 'categories.id')
                  //->where('applications.id', '=', $id);
            //})->first();

      //$nombre_categoria = $categoria->name;
      $aplicacion = Application::findOrFail($id);

      return view('dev_detail', compact('aplicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      //$categoria = DB::table('applications')
          //->join('categories', function ($join) use($id){
              //$join->on('applications.category_id', '=', 'categories.id')
                  //->where('applications.id', '=', $id);
            //})->get();
      //$resultado = json_decode($categoria, true);
      //$nombre_categoria =  $resultado[0]['name'];
      $aplicacion = Application::findOrFail($id);

      return view('edit', compact('aplicacion'));

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
      $validacion = [
          'Description' => 'required|string|max:200',
          'Price' => 'required',
          'Picture' => 'required|max:10000|mimes:jpeg,png,jpg,bmp'
      ];

      $mensaje = [
          "required" => 'El campo :attribute es requerido',
          "string" => 'El campo :attribute debe ser un texto',
          "max" => 'El campo :attribute no debe superar los :max caracteres',
          "mimes" => 'La fotografía debe ser formato jpeg, png, jpg o bmp'
      ];

      $datosValidados = $request->validate($validacion, $mensaje);

        if ($request->hasFile('Picture')) {
          //Encontrar id y borrar fotografía anterior.
          $aplicacion = Application::findOrFail($id);
          Storage::delete('public/' . $aplicacion->picture);

          $datosValidados['picture'] = $request->file('Picture')->store('uploads', 'public');
          }

          Application::where('id', '=', $id)->update($datosValidados);
          return redirect('me/application')->with('success', 'Aplicación modificada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $aplicacion = Application::findOrFail($id);
      $aplicacion->deleted = 1;
      $aplicacion->save();
      return response()->json('response');
    }
}
