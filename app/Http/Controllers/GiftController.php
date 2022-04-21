<?php

namespace App\Http\Controllers;

use App\Http\Resources\GiftResource;
use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GiftController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return response()->json([
      'success' => 'true',
      'data' => GiftResource::collection(Gift::get()),
    ], 200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'user_id' => 'numeric',
      'parent_id' => 'numeric',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => 'false',
        'data' => $validator->errors(),
      ], 422);
    }

    $gift = new Gift();
    $gift->name = $request->name;
    if ($request->has('user_id')) $gift->user_id = $request->user_id;
    if ($request->has('parent_id')) $gift->parent_id = $request->parent_id;

    $gift->save();

    return response()->json([
      'success' => 'true',
      'data' => new GiftResource($gift),
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Gift  $gift
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $gifts = Gift::where('id', $id);
    if ($gifts->count()) {
      return response()->json([
        'success' => 'true',
        'data' => new GiftResource($gifts->first()),
      ]);
    } else {
      return response()->json([
        'success' => 'false',
        'data' => null,
      ]);
    }
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Gift  $gift
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $gifts = Gift::where('id', $id);

    if ($gifts->count()) {

      $gifts->first()->delete();

      return response()->json([
        'success' => 'true',
        'data' => null,
      ]);

    } else {
      return response()->json([
        'success' => 'false',
        'data' => null,
      ]);
    }
  }
}
