@extends('admin.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ml-4 text-gray-800">Category</h1>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/category">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <form action="/category" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Create Category</h6>
                    </div>
                    <div class="card-body">
                        
                        {{-- <x-input field="title" label="Name" type="text" placeholder="Enter name of category"/>
                        <x-textarea field="description" label="Description"/>
                        <x-input field="image" id="customFile" label="Choose File" type="file" /> --}}
                        <div class="form-group"> 
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="" placeholder="Enter name of the category" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <label class="custom-file-label" for="customFile">Choose File</label>
                                <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" value="{{ old('image') }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection