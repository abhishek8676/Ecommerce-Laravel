@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif



        <div class="card"></div>
        <div class="card-header"></div>
        <h3>Add Slider
            <a href="{{url('admin/sliders')}}" class="btn btn-danger btn-sm text-white float-end">
                BACK
            </a>
        </h3>
    </div>
    <div class="card-body">
        <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
            @csrf  
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class = "form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" />
            </div>
            <div class="mb-3">
                <label>Status</label><br/>
                <input type="checkbox" name="status" style="width:30px; height:30px"/> Checked=Hidden, UnChecked=Visible
            </div>
            <div class="mb-3">
                <button type = "Submit" class = "btn btn-primary">Save</button>
            </div>

        </form>

    </div>
</div>
</div>
</div>


@endsection
