<?php

namespace App\Http\Controllers;

use App\Category;
use App\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    private $rule = [
        'title' => 'required',
        'link' => 'url',
        'start_date' => 'date',
        'end_date' => 'date',
        'start_time' => 'date_format:H:i',
        'end_time' => 'date_format:H:i',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Information::all();

        return view('admin.information.index', ['informations' => $informations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.information.create', ['categories' => $categories]);
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

        $id = Information::create([
            'title' => request('title'),
            'location' => request('location'),
            'thumb' => request('thumb'),
            'phone' => request('phone'),
            'link' => request('link'),
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'start_time' => request('start_time'),
            'end_time' => request('end_time'),
            'category_id' => request('category_id'),
        ]);

        return redirect(route('admin.information.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        return view('admin.information.show', ['information' => $information]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        $categories = Category::all();

        return view('admin.information.edit', ['information' => $information, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        request()->validate($this->rule);

        $information->update([
            'title' => request('title'),
            'location' => request('location'),
            'thumb' => request('thumb'),
            'phone' => request('phone'),
            'link' => request('link'),
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'start_time' => request('start_time'),
            'end_time' => request('end_time'),
            'category_id' => request('category_id'),
        ]);

        return redirect(route('admin.information.show', ['information' => $information]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        $information->delete();
        return redirect(route('admin.information.index'));
    }
}
