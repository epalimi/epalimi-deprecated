<?php

namespace App\Http\Controllers;

use App\Category;
use App\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    private $rule = [
        'title' => 'required',
        'link' => 'nullable|url',
        'thumb' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date',
        'start_time' => 'nullable|date_format:H:i',
        'end_time' => 'nullable|date_format:H:i',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Information::paginate(10);

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

        $thumb_path = request()->hasFile('thumb') ? request()->file('thumb')->store('information_thumb') : null;

        $id = Information::create([
            'title' => request('title'),
            'organization' => request('organization'),
            'thumb' => $thumb_path,
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

        if (request()->hasFile('thumb') && $information->thumb != null) {
            Storage::delete([$information->thumb]);
        }
        $thumb_path = request()->hasFile('thumb') ? request()->file('thumb')->store('information_thumb') : $information->thumb;

        $information->update([
            'title' => request('title'),
            'organization' => request('organization'),
            'thumb' => $thumb_path,
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
        if ($information->thumb != null) {
            Storage::delete([$information->thumb]);
        }

        $information->delete();
        return redirect(route('admin.information.index'));
    }
}
