<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Buy;

class BuyController extends Controller
{
  public function store(Request $request)
  {

    // se agrega el ajax
    if ($request->ajax()) {
      $compra = new Buy();
      $compra->buyer_id = auth()->user()->id;
      $compra->application_id = intval($request->id);
      $compra->save();
      return response()->json([
          'message' => 'Nueva compra realizada'
        ]);
    }

  }

  public function destroy($id)
    {
        Buy::destroy($id);
        //return response()->json([
            //'message' => 'paso por aca'
          //]);
          //return ('es el controlador');
          return response()->json('users deleted');
      }
      //Buy::destroy($id);
      //return redirect('me/client');
}
