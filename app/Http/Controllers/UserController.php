<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
      'data' => UserResource::collection(User::get()),
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
      'email' => 'required|email',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => 'false',
        'data' => $validator->errors(),
      ], 422);
    }

    $user = User::create($request->all());

    return response()->json([
      'success' => 'true',
      'data' => new UserResource($user),
    ], 200);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $users = User::where('id', $id);
    if ($users->count()) {
      return response()->json([
        'success' => 'true',
        'data' => new UserResource($users->first()),
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
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $users = User::where('id', $id);
    if ($users->count()) {
      $users->first()->delete();
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
