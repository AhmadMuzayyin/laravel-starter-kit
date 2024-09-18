<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    protected $model;
    public function __construct($model = Role::class)
    {
        $this->model = $model;
    }
    public function index()
    {
        return view('roles.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        try {
            $this->model::create($request->all());
            return redirect()->route('roles.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
