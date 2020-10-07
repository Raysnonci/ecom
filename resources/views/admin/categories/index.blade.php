@extends('admin.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-8">
        <h1 class="h3 mb-0 ml-4 text-gray-800">Category</h1>
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item"><a href="/category/create">Create</a></li>
        </ol>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Categories Table</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $key=>$category)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td><img src="{{ Storage::url($category->image) }}" width="100"></td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td><a href="{{ route('category.edit', [$category->id]) }}" class="btn btn-sm btn-primary">Edit</a></td>
                                <td>
                                  <form action="{{ route('category.destroy', [$category->id]) }}" method="POST" onsubmit="return confirmDelete()">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                  </form>
                                </td>
                            </tr>
                        @empty
                            <td>No category created</td>
                        @endforelse
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
        </div>
    </div>
@endsection