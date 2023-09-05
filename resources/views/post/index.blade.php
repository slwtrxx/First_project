@extends('layouts.main')
@section('content')
     <div>
         <br>
         <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">Add one</a>
     </div>
     <br>
     @foreach($posts as $post)
         <!-- Вывод названия и его id -->
         <div><a href="{{ route('post.show', $post->id) }}"></a>{{$post->id }} . {{ $post->title }}</div>
     @endforeach

         <div class="mt-3">
             <br>
             {{ $posts->withQueryString()->links() }}
         </div>
 </div>
@endsection

