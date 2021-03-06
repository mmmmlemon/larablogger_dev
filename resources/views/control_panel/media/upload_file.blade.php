@extends('layouts.app')
@section('title', 'Upload media files'." -")
@section('content')  
<div class="container white-bg">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="/control">Control panel</a></li>
            <li><a href="/control/posts">Posts</a></li>
            <li><a href="/control/media" aria-current="page">Media browser</a></li>
            <li class="is-active"><a href="#" aria-current="page">Upload files</a></li>
        </ul>
    </nav>
    <div class="has-text-centered">
        <h1 class="title">Upload media files</h1>
    </div>
    <hr>
    <form action="/post/upload_files" class="dropzone" id="file_form">
        @csrf
        <div class="fallback">
          <input name="file" type="file" multiple />
        </div>
    </form>

    <div class="white-bg">
        <h3 class="subtitle">Uploaded files</h3>
        <div id="uploaded_list">
                <p id="no_files_yet">No files uploaded yet</p>
        </div>
    </div>
    
    <form action="/control/save_uploaded_media" method="POST">
        @csrf
        <button class="button is-link" id="submit_files">
            <span class="icon">
                <i class="fas fa-save"></i>
            </span>
            <span>Save files</span>
        </button>
    </form>

</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script src="{{ asset('js/custom/control_panel/upload_media.js') }}"></script>
@endpush