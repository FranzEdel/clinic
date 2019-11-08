<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests\Role\StoreRequest;
use App\Http\Requests\Role\UpdateRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Pendiente añadir autrizaciones
        //dd(Role::all());
        return view('theme.backoffice.pages.role.index', [ 'roles' => Role::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.backoffice.pages.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Role $role)
    {
        //dd($request);
        $role = $role->store($request);
        alert('Éxito', 'El rol se ha guardado', 'success')->showConfirmButton();
        //toast('Rol guardado', 'success', 'top-right');
        return redirect()->route('backoffice.role.show', $role);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //Pendiente añadir autrizaciones
        return view('theme.backoffice.pages.role.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //Pendiente añadir autrizaciones
        return view('theme.backoffice.pages.role.edit', ['role' => $role]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Role $role)
    {
        //dd($request,'OK');
        $role->my_update($request);
        alert('Éxito', 'El rol se ha actualizado', 'success')->showConfirmButton();
        return redirect()->route('backoffice.role.show', $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //Pendiente añadir autrizaciones
        //dd($role);
        $role->delete();
        alert('Éxito', 'Rol eliminado', 'success')->showConfirmButton();
        return redirect()->route('backoffice.role.index');
    }
}
