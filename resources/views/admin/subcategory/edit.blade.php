@extends('admin.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ml-4 text-gray-800">Sub Category</h1>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <form action="{{ route('subcategory.update', [$subcategory->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Sub Category</h6>
                    </div>
                    <div class="card-body">
                        
                        {{-- <x-input field="title" label="Name" type="text" placeholder="Enter name of category"/>
                        <x-textarea field="description" label="Description"/>
                        <x-input field="image" id="customFile" label="Choose File" type="file" /> --}}
                        <div class="form-group"> 
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="" value="{{ old('name')?  old('name'):$subcategory->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <label>Choose Category</label>
                                <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                                    {{-- <option value="{{ $subcategory->category_id }}">{{ $subcategory->categoryName }}</option> --}}
                                    @foreach ($categories as $category)
                                        {{-- @if ($category->id != $subcategory->category_id) --}}
                                            <option value="{{ $category->id }}" 
                                                @if ($category->id == $subcategory->category_id)
                                                    selected
                                                @endif>{{ $category->name }}</option>
                                        {{-- @endif --}}
                                    @endforeach
                                </select>
                                
                                @error('category')
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