@extends('layouts.app')
@section('content')
<div class="container white-bg">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
          <li><a href="/control">Control panel</a></li>
          <li><a href="/control/categories" aria-current="page">Categories</a></li>
          <li class="is-active"><a href="/control/categories" aria-current="page">Add category</a></li>
        </ul>
      </nav>
    <div class="column is-12">
        <a href="{{url()->previous()}}" class="button is-link">
            <span class="icon">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span>
             Back
            </span>
        </a>
    </div>

    <div class="is-divider"></div>
    <div class="columns">
        <div class="column">
            <form action="/control/categories/add" method="POST">
                @csrf
                <div class="field">
                    <label class="label">Category name</label>
                    <div class="control">
                      <input class="input @error('category_name') is-danger @enderror"
                       name="category_name" type="text" maxlength="20" placeholder="Category name" id="title"
                       value="@if($errors->any()){{old('category_name')}}@else @endif">
                    </div>
                    @error('category_name')
                    <p class="help is-danger"><b> {{ $message }}</b></p>  
                   @enderror
                  </div>
                  <div class="control">
                    <button class="button is-link">Submit</button>
                  </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/char_counter.js') }}"></script>
<script>
    
  $(document).ready(function(){
    $('#title').charCounter();
  });

</script>
@endpush