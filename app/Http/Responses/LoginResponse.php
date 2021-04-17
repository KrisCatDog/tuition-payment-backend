<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    /**
     * @param $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $role = auth()->user()->role->name;

        return $request->wantsJson()
            ? response()->json(['data' => ['role' => $role]])
            : redirect('home');
    }
}
