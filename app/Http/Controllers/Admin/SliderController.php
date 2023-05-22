<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required',
                'sub_title' => 'required',
                'image' => 'required',
            ]
        );

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/slider')) {
                mkdir('uploads/slider', 077, true);
            }

            $image->move('uploads/slider', $imagename);
        } else {
            $imagename = 'default.png';
        }

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->image = $imagename;
        $slider->save();
        Toastr::success('Slider Create Successfully.', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('slider.index');
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
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { {
            $this->validate(
                $request,
                [
                    'title' => 'required',
                    'sub_title' => 'required',
                ]
            );


            $image = $request->file('image');
            $slug = str_slug($request->title);
            $slider = Slider::find($id);

            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imagename = $slug . '-' . $currentDate . '-' . '.' . $image->getClientOriginalExtension();
                if (!file_exists('uploads/slider')) {
                    mkdir('uploads/slider', 077, true);
                }

                $image->move('uploads/slider', $imagename);
            } else {
                $imagename = $slider->image;
            }

            $slider->title = $request->title;
            $slider->sub_title = $request->sub_title;
            $slider->image = $imagename;
            $slider->save();

            return redirect()->route('slider.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        if (file_exists('uploads/slider/' . $slider->image)) {
            unlink('uploads/slider/' . $slider->image);
        }

        $slider->delete();
        return redirect()->route('slider.index');
    }
}
