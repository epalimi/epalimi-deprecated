<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    private $rule = [
        'title' => 'required',
        'description' => 'required',
        'link' => 'nullable|url',
        'background' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        'order' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::ordered()->get();
        return view('admin.banner.index', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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

        $path = request()->hasFile('background') ? request()->file('background')->store('banner_background') : null;
        $id = Banner::create([
            'title' => request('title'),
            'description' => request('description'),
            'footer' => request('footer'),
            'link' => request('link'),
            'background' => $path,
            'order' => request('order'),
        ]);

        return redirect()->route('admin.banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('admin.banner.show', ['banner' => $banner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', ['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'nullable|url',
            'background' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'order' => 'required',
        ]);

        if (request()->hasFile('background') && $banner->background != null) {
            Storage::delete([$banner->background]);
        }
        $path = request()->hasFile('background') ? request()->file('background')->store('banner_background') : $banner->background;

        $banner->update([
            'title' => request('title'),
            'description' => request('description'),
            'footer' => request('footer'),
            'link' => request('link'),
            'background' => $path,
            'order' => request('order'),
        ]);
        return redirect()->route('admin.banner.show', ['banner' => $banner]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if ($banner->background != null) {
            Storage::delete([$banner->background]);
        }

        $banner->delete();
        return redirect()->route('admin.banner.index');
    }
}
