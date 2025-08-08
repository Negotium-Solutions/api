<?php

namespace App\Http\Controllers\Api\Central;

use App\Http\Controllers\Controller;
use App\Models\Central\User;
use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    use ApiResponse;

    public function get(Request $request, User $user = null) {
        try {
            if (!isset($user)) {
                $user = $request->user()->only(['id', 'first_name', 'last_name', 'email', 'roles', 'permissions']);
            }
            return $this->success('User retrieved successfully.', Response::HTTP_OK, $user);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
