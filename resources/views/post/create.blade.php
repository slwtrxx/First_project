@extends('layouts.main')
@section('content')
    <div class="container">
 <div class="row">
     <br>
     <form action="{{ route('post.store') }}" method="post">
         @csrf
         <div class="form-group">
             <br>
             <label for="title">Title</label>
             <input
                 value="{{ old('title') }}"
                 type="text" name="title" class="form-control" id="title" placeholder="Title">
             <!-- Если пользователь не заполнит поля form - вывести вот такую ошибку -->
             @error('title')
             <p class="text-danger">{{ $message }}</p>
             @enderror
         </div>
         <br>
         <div class="form-group">
             <label for="content">Content</label>
             <textarea
                 value="{{ old('content') }}" class="form-control" name="content" id="content" placeholder="Content"></textarea>
             @error('content')
             <p class="text-danger">{{ $message }}</p>
             @enderror

         </div>
         <div class="form-group">
             <br>
             <label for="image">Image</label>
             <input  value="{{ old('image') }}" name="image" type="text" class="form-control" id="image" placeholder="Image">
             @error('image')
             <p class="text-danger">{{ $message }}</p>
             @enderror
         </div>
         <br>
         <div class="form-group">
             <label for="category">Category</label>
             <select class="form-control" id="category" name="category_id">
                 <!-- Вывод наших категорий ('cats', 'doogs') из БД -->
                 @foreach($categories as $category)
                     <option
                         {{ old('category_id') == $category->id ? '  selected' :  '' }}
                         value="{{ $category->id }}">{{ $category->title }}</option>
                 @endforeach
             </select>
         </div>
         <br>
         <div class="form-group">
             <label for="tags">Tags</label>
             <select class="form-control" id="tags" name="tags[]">
                 <!-- Вывод наших тегов ('cats', 'doogs') из БД -->
                 @foreach($tags as $tag)
                     <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                 @endforeach
             </select>
         </div>
             <br>
         <button type="submit" class="btn btn-primary">Create</button>
     </form>
 </div>
    </div>
@endsection
