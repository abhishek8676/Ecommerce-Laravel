<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }
    public function createe()
    {
        return view('admin.slider.create');
    }
    public function store(Request $request)
    {
        // echo "hello";
        // die;


        // $validatedData = $request->validated();
        $request->validate([
            'title' => 'required'
        ]);
        if($request->hasFile('')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('uploads/slider/',$filename);
            $validatedData['image'] = "uploads/slider/$filename";
        }

        $slider = new Slider;
        $slider->title = $request->title;
        $slider->description =  $request->description;
        $slider->image = $request->image;
        $slider->status =  $request->status;
        $slider->save();


        // $validatedData['status'] = $request->status == true ? '1':'0';
        
        return redirect('admin/sliders')->with('message', 'Slider added successfully');
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    public function update(Request $request ,Slider $slider)
    {
        
        $request->validate([
            'title' => 'required'
        ]);
        if($request->hasFile('')){
            $destination = $slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('uploads/slider/',$filename);
            $validatedData['image'] = "uploads/slider/$filename";
        }

        $slider = new Slider;
        $slider->title = $request->title;
        $slider->description =  $request->description;
        $slider->image = $request->image;
        $slider->status =  $request->status;
        $slider->save();


        // $validatedData['status'] = $request->status == true ? '1':'0';
        
        return redirect('admin/sliders')->with('message', 'Slider updated successfully');
    }

}
