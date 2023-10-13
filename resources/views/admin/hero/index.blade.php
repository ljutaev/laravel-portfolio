@extends('admin.layouts.layout')

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Hero Section</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Update Hero Section</h2>
        <p class="section-lead">
            On this page you can create a new post and fill in all fields.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Write Your Post</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.hero.update', 1) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- title -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="title" type="text" class="form-control" value="{{$hero->title}}">
                                </div>
                            </div>
                            <!-- sub title -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="sub_title" type="text" class="form-control" style="min-height: 200px;" value="{{$hero->sub_title}}">{{$hero->sub_title}}</textarea>
                                </div>
                            </div>
                            <!-- btn text -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button Text</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="btn_text" type="text" class="form-control" value="{{$hero->btn_text}}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button Url</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="btn_url" type="text" class="form-control"  value="{{$hero->btn_url}}">
                                </div>
                            </div>
                            @if($hero->image)
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <img src="{{ asset($hero->image) }}" alt="Image" width="400px">
                                </div>
                            </div>
                            @endif
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Background Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection