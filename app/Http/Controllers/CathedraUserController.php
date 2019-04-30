<?php

namespace App\Http\Controllers;

use App\Models\CathedraUser;
use App\Models\Group;
use Illuminate\Http\Request;

class CathedraUserController extends Controller
{
    public function all()
    {
        $teachers = CathedraUser::whereRole(2)->get();
        $groups = Group::with(['students'])->get();
        $applicants = CathedraUser::whereRole(3)->get();
        $others = CathedraUser::whereRole(0)->get();

        return response()->json(compact(['teachers', 'groups', 'applicants', 'others']));
    }
}
