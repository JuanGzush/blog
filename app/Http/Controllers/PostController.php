<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 2)->latest('id')->paginate(8);  //nos devuelve todos los post con status de publicado (2)
        return view('posts.index', compact('posts'));
    }
    public function show(Post $post)
    {
        $similares = Post::where('category_id', $post->category_id)   /* cuyo category_id conincidan,  */
            ->where('status', 2)                      /*  que este publicado */
            ->where('id', '!=', $post)               /* que el id sea distinto al del $post actual, para que no se repita */
            ->latest('id')                         /*  ordenado descendente */
            ->take(4)                              /*  traiga solo 4 */
            ->get();                               /*  para que se cree la coleccion */
        return view('posts.show', compact('post', 'similares'));
    }

    public function category(Category $category)
    {
        $posts = Post::where('category_id', $category->id)
            ->where('status', 2)
            ->latest('id')
            ->paginate(4);

        return view('posts.category', compact('posts','category'));
    }

    public function tag(Tag $tag){
        $posts = $tag->posts()->where('status',2)->latest('id')->paginate(4);
        return view('posts.tag',compact('posts','tag')) ; 
        
        
    

    }






}
