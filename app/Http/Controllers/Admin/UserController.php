<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin\Department;
use App\Models\Admin\Section;
use App\Models\Admin\Shop;
use App\Models\Horensou\HorensouRole as Role;
use Yajra\Datatables\Datatables;


class UserController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'nik' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('horensou.request.index')->withSuccess('Login successfuly');
        }

        return back()->withError("Data yang diberikan tidak sesuai dangan database record.")->onlyInput('nik');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with(['department', 'section', 'shop', 'position'])->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('is_admin', function(User $user) {
                    return $user->is_admin == 1 ? 'Administrator' : 'User' ;
                })
                ->editColumn('nik', function(User $user) {
                    $dropdownMenu = '<div class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-expanded="false" style="color: black;">
                                            ' . $user->nik . '
                                        </a>
                                        <div class="dropdown-menu">
                                            <span class="dropdown-item-text" style="font-size: 14px;">' . $user->nik . "-" . $user->name . '</span>
                                            <a class="dropdown-item" href="#" data-id="' . $user->id . '">
                                                Edit
                                            </a>
                                            <a class="dropdown-item bg-danger" href="#" data-id="' . $user->id . '">
                                                Delete
                                            </a>
                                        </div>
                                    </div>';
                    return $dropdownMenu;
                })
                ->escapeColumns([])
                // ->addColumn('action', function($row){
                //     $actionBtn = '<a href="javascript:void(0)" class="user-edit badge bg-success" style="padding: 5px 8px; font-size: 12px; border-radius: 10px;"
                //                     data-toggle="modal" data-target="#user-modal" data-id="' .$row->id.'" data-department-id="'. $row->department->id .'" data-section-id="'. $row->section->id .'">
                //                         Edit
                //                     </a> 
                //                 <a href="javascript:void(0)" class="user-delete badge bg-danger" style="padding: 5px 8px; font-size: 12px; border-radius: 10px;"
                //                     data-id="' . $row->id. '">Delete</a>';
                //     return $actionBtn;
                // })
                // ->rawColumns(['action'])
                ->make(true);
        }

        $users = User::all();
        $roles = Role::with(['section', 'user'])->get();
        return view('admin.user', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
