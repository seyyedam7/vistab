<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function password(Request $request)
    {
        $user = User:: findOrFail($request->user_id);
        $user->password =Hash::make( $request->Password);
    }

}
