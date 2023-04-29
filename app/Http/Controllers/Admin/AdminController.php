<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Department;
use App\Models\Admin\Section;
use App\Models\Admin\Shop;
use App\Models\Admin\Position;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $departments = Department::select('id', 'name')->with('sections:id,department_id,name')->get();
        $sections = Section::select('id', 'department_id', 'name')->with(['shops:id,name,section_id'])->get();
        $shops = Shop::select('id', 'section_id', 'name')->get();
        $positions = Position::select('id','position')->get();
        return view('admin.index', compact('departments', 'sections', 'shops', 'positions'));
    }
}
