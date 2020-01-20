<?php

namespace App\Http\Controllers\API;

use App\Models\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function store(Request $request)
    {
        $group = new Group();
        $group->name = $request->name;
        $group->image_path = $request->image_path;
        $group->save();
    }

}
