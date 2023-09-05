<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\PostTag;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $post = Post::find(1);
        $category = Category::find(1);
        $tag = Tag::find(1);
        dd($post->tags);
        return view('post.index', compact('posts'));

      }

      public function create(){
          $categories = Category::all();

          $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
      }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
         $tags = $data['tags'];
         unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

         return redirect()->route('post.index');
    }

     public function  show(Post $post)
     {

           return view('post.show', compact('post'));

     }

     public function edit(Post $post)
     {
         $categories = Category::all();
         $tags = Tag::all();

         return view('post.edit', compact('post', 'categories', 'tags'));
     }




    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
       return redirect()->route('post.show', $post->id);
    }


      public function delete()
      {
          $post = Post::withTrashed()->find(8);

          $post->restore();

          dd('deleted');
      }

      public function destroy(Post $post)
      {
          $post->delete();
          return redirect()->route('post.index');
      }



    public function firstOrCreate()
    {
        $anotherPost = [

            'title' => 'Наименование товаров',
            'content' => 'Интересный, содержательный контент',
            'image' => 'some Imageblabla.jpg',
            'likes' => 5000,
            'is_published' => 1,
        ];
        $post = Post::firstOrCreate([

            'title' => 'Наименование товаров',
        ],[
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some Imageblabla.jpg',
            'likes' => 5000,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => ' updateorcreate Наименование товаров',
            'content' => 'updateorcreate Интересный, содержательный контент',
            'image' => 'updateorcreate some Imageblabla.jpg',
            'likes' => 500,
            'is_published' => 0,
        ];

        $post = Post::updateOrCreate([
            'title' => 'some post title not',
        ],[
            'title' => 'some post title not',
            'content' => 'its not update Интересный, содержательный контент',
            'image' => 'updateorcreate some Imageblabla.jpg',
            'likes' => 500,
            'is_published' => 0,
        ]);
           dump($post->content);
           dd('updateOrCreate');
    }
}

