<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    private $rule = [
        'category' => 'required',
        'name' => 'required',
        'link' => 'nullable|url',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Organization::select('category')->distinct()->get();
        $organization = Organization::latest()->get();
        return view('admin.organization.index', ['organizations' => $organization, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Organization::select('category')->distinct()->get();
        return view('admin.organization.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate($this->rule);

        $id = Organization::create([
            'category' => request('category'),
            'name' => request('name'),
            'link' => request('link'),
        ]);

        return redirect()->route('admin.organization.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        return view('admin.organization.show', ['organization' => $organization]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        $categories = Organization::select('category')->distinct()->get();
        return view('admin.organization.edit', ['organization' => $organization, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        request()->validate($this->rule);

        $organization->update([
            'category' => request('category'),
            'name' => request('name'),
            'link' => request('link'),
        ]);

        return redirect()->route('admin.organization.show', ['organization' => $organization]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();
        return redirect()->route('admin.organization.index');
    }
}
