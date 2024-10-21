@extends('backend.layouts.app')

@section('content')

<form action="{{ route('patbd.blog.imgUpload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="form-group mt-2">
            <label for=''>File</label>
            <input class="form-control" type="file" name="image">
        </div>    
        <button class="btn btn-primary" type="submit">Upload</button>
    </div>
</form>

@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

@if(isset($uploadedImages) && $uploadedImages->isNotEmpty())
    <div class="uploaded-images mt-3">
        <h3>Uploaded Images:</h3>
        <div class="gallery mt-4" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 7px;">
            @foreach ($uploadedImages as $uploadedImage)
                <div class="gallery-item" style="position: relative; width: 300px; height: 300px; overflow: hidden; transition: all 0.3s;">
                    <img src="/storage/galleryupload/{{ $uploadedImage }}" class="img-fluid w-100" 
                         style="width: 100%; height: 100%; object-fit: cover;" />
                    <a href="/storage/galleryupload/{{ $uploadedImage }}" target="_blank" data-lightbox="gallery">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                    
                    <!-- Delete Button -->
                    <form action="{{ route('patbd.blog.deleteImage', $uploadedImage) }}" method="POST" 
                          style="position: absolute; top: 10px; right: 10px;" 
                          class="delete-btn">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Image">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endif

<br>
<h3>Blog Images:</h3>
<br>
<div class="gallery mt-4" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 7px;">
    @foreach ($blogs as $blog)
        <div class="gallery-item" style="width: 300px; height: 200px; overflow: hidden;">
            <div class="bg-image hover-overlay shadow-1-strong ripple rounded-5 mb-4" data-mdb-ripple-color="light">
                <img src="/img/{{ $blog->image }}" class="img-fluid w-100" 
                     style="width: 100%; height: 100%; object-fit: cover;" />
                <a href="/img/{{ $blog->image }}" target="_blank" data-lightbox="gallery">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
            </div>
        </div>
    @endforeach
</div>

<nav class="app-pagination">
    <div class="mx-auto">
        {{ $blogs->links() }}
    </div>
</nav><!--//app-pagination-->

@endsection
