@extends('layouts.main')
@section('content')
    <div class="container">
 <div class="row">
     <br>
     <form action="{{ route('post.update', $post->id) }}" method="post">
         @csrf
         @method('patch')
         <div class="form-group">
             <br>
             <label for="title">Title</label>
             <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $post->title }}">
         </div>
         <div class="form-group">
             <br>
             <label for="content">Content</label>
             <textarea class="form-control" name="content" id="content" placeholder="Content">{{ $post->content }}</textarea>
         </div>
         <div class="form-group">
             <br>
             <label for="image">Image</label>
             <input  name="image" type="text" class="form-control" id="image" value="{{ $post->image }}" placeholder="Image">
         </div>
         <br>
         <div class="form-group">
             <label for="category">Category</label>
             <select class="form-control" id="category" name="category_id">
                 <!-- Вывод наших категорий ('cats', 'doogs') из БД -->
                 @foreach($categories as $category)
                     <option
                         {{ $category->id === $post->category->id ? ' selected' : '' }}
                         value="{{ $category->id }}">{{ $category->title }}</option>
                 @endforeach
             </select>
         </div>
         <br>
         <div class="form-group">
             <label for="tags">Tags</label>
             <option class="form-control" id="tags" name="tags[]">
                 <!-- Вывод наших тегов ('cats', 'doogs') из БД -->
                 @foreach($tags as $tag)
                     <option
                         @foreach($post->tags as $postTag)
                             {{ $tag->id === $postTag->id ? ' selected' : '' }}
                         @endforeach
                         value=" {{ $tag->id }}">{{ $tag->title }}</option>
                 @endforeach
             </select>
         </div>
         <button type="submit" class="btn btn-primary">Update</button>
     </form>
 </div>
    </div>
@endsection
