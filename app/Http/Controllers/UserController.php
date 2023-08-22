<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Gets users except yourself
     *
     * @return JsonResponse
     */

   public function index(): JsonResponse
   {
        $user = User::where('id','!=',auth()->user()->id)->get();
        return $this->success($user);
   }
}
