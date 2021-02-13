<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryPosts;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('users.posts.index', compact('posts'));
    }

    public function create()
    {
        $allcategories = Category::orderBy('name')->get();
        $post = new Post();
        $catPosts = array();
        return view('users.posts.create', compact('post', 'allcategories', 'catPosts'));
    }

    public function update($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $user_id = Auth::id();

        $request->validate([
            'image'       => 'mimes:jpeg,png,jpg|max:2048',
            'title'       => 'required|max:120',
            'text'        => 'nullable|min:99',
            'word'        => 'nullable|min:10|max:150',
            'images'      => 'array|max:2',
            'images.*'    => 'mimes:jpeg,png,jpg|max:2048',
            'post_url'    => 'nullable|active_url',
            'categories'  => 'array|max:3'
        ]);

//        glxavor nkar@ sarqelu hamar

        $image_name = "";
        if ($request->file('image')) {
            Storage::disk('public')->delete('uploads/image/posts/' . $post->image);
            $img_file = Image::make($request->file('image'))->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(null, 350);
            $image_name = date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/posts/'. $image_name, 60);
        }else if ($post->image && $request->image_delete !== 'none'){
            $image_name = $post->image;
        }else if ($request->image_delete == 'none'){
            Storage::disk('public')->delete('uploads/image/posts/' . $post->image);
            $image_name = "";
        }else{
            $image_name = "";
        }

        //        nkarner@ sarqelu hamar pord

        $img_arr_string = "";
        if ($request->file('images')) {
            $images = explode(',', $post->images);
            foreach ($images as $img) {
                Storage::disk('public')->delete('uploads/image/posts/' .  $img);
            }
            $img_arr = array();
            foreach ($request->File('images') as $img) {
                $imgs_file = Image::make($img)->resize(700, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $imgs_file->resizeCanvas(null, 350);
                $imgs_name = rand(111111, 999999) . '.jpg';
                $imgs_file->save('storage/uploads/image/posts/'. $imgs_name, 60);
                array_push($img_arr, "$imgs_name");
            }
            $img_arr_string = implode(",", $img_arr);
        }else if ($post->images && $request->images_delete !== 'none'){
            $img_arr_string = $post->images;
        }else if ($request->images_delete == 'none'){
            $images = explode(',', $post->images);
            foreach ($images as $img) {
                Storage::disk('public')->delete('uploads/image/posts/' .  $img);
            }
            $img_arr_string = "";
        }else{
            $img_arr_string = "";
        }

        $short_text = mb_substr($request->text, 0, 160, "utf-8") . '...';


        $form_data = array(
            'image'                  =>  $image_name,
            'title'                  =>  $request->title,
            'post_url'               =>  $request->post_url,
            'text'                   =>  $request->text,
            'images'                 =>  $img_arr_string,
            'short_text'             =>  $short_text,
            'text_video'             =>  $request->text_video,
            'video'                  =>  $request->video,
            'word'                   =>  $request->word,
            'publish'                =>  $request->publish,
            'user_id'                =>  $user_id,
        );

        $post->update($form_data);

        if($request->categories) {
            $post->categories()->detach();
            $cat_id = $request->categories;
            $post->categories()->attach($cat_id);
        }

        return redirect()->route('users.posts.index', compact(  'image_name', 'img_arr_string','short_text'))
            ->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $post= Post::findOrFail($id);
        $images = explode(',', $post->images);
        $allcategories = Category::orderBy('name')->get();
        $catPosts = $post->categories;

        return view('users.posts.edit', compact('post', 'images', 'allcategories', 'catPosts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'       => 'mimes:jpeg,png,jpg|max:2048',
            'title'       => 'required|min:10|max:120',
            'text'        => 'nullable|min:99',
            'word'        => 'nullable|min:10|max:150',
            'images'      => 'array|max:2',
            'images.*'    => 'mimes:jpeg,png,jpg|max:2048',
            'post_url'    => 'nullable|active_url',
            'categories'  => 'required|array|max:3'
        ]);

        $user_id = Auth::id();

//        glxavor nkar@ sarqelu hamar
        $image_name = "";
        if ($request->file('image')) {
            $img_file = Image::make($request->file('image'))->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(null, 350);
            $image_name = date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/posts/'. $image_name, 60);
        }

        //        nkarner@ sarqelu hamar pord

        $img_arr_string = "";
        if ($request->file('images')) {
            $img_arr = array();
            foreach ($request->File('images') as $img) {

                $imgs_file = Image::make($img)->resize(700, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $imgs_file->resizeCanvas(null, 350);
                $imgs_name = rand(111111, 999999) . '.jpg';
                $imgs_file->save('storage/uploads/image/posts/'. $imgs_name, 60);
                array_push($img_arr, "$imgs_name");
            }
            $img_arr_string = implode(",", $img_arr);
        }

        $short_text = mb_substr($request->text, 0, 160, "utf-8") . '...';

        $form_data = array(
            'image'                  =>  $image_name,
            'title'                  =>  $request->title,
            'post_url'               =>  $request->post_url,
            'text'                   =>  $request->text,
            'short_text'             =>  $short_text,
            'images'                 =>  $img_arr_string,
            'text_video'             =>  $request->text_video,
            'word'                   =>  $request->word,
            'publish'                =>  $request->publish,
            'user_id'                =>  $user_id,
        );

        $post = Post::create($form_data);
        $cat_id = $request->categories;
        $post->categories()->attach($cat_id);

        return redirect()->route('users.posts.index', compact(  'image_name', 'img_arr_string'))
            ->with('message', "Contact has been updated successfully");
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $images = explode(',', $post->images);
        $url = $post->post_url;
        $post_url = parse_url($url, PHP_URL_HOST);

        return view('users.posts.show', compact('post','images', 'post_url'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->image) {
            Storage::disk('public')->delete('uploads/image/posts/' . $post->image);
        }
        if ($post->images) {
        $images = explode(',', $post->images);
            foreach ($images as $img) {
                Storage::disk('public')->delete('uploads/image/posts/' .  $img);
            }
        }
        $post = Post::findOrFail($id)->delete();
        return redirect()->route('users.posts.index')->with('message', "Contact has been deleted successfully");
    }
//.........................................
    public function news()
    {
        $posts = Post::where('publish', 'yes')->latest()->paginate(10);
        $og_title = 'Մասիսջան, ծանոթացիր Մասիս քաղաքի բոլոր նորություններին';
        $og_description = 'Այստեղ կարող եք տեղեկատվություն գտնել Մասիս քաղաքի վերաբերյալ բոլոր նորությունների մասին․․․';
        return view('all.news.index', compact('posts', 'og_description', 'og_title'));
    }

    public function news_show($id)
    {
        $post = Post::findOrFail($id);
        if($post->publish == 'yes') {
            $post->count = $post->count + 1;
            $post->save();
            $images = explode(',', $post->images);
            $url = $post->post_url;
            $post_url = parse_url($url, PHP_URL_HOST);
            $og_title = $post->title;
            $og_description = $post->short_text;
            if($post->image){
                $og_image = asset('storage/uploads/image/posts/' . $post->image);
            }else{
                $og_image = asset('image/app/default-post.jpg');
            }
            return view('all.news.show', compact('post', 'images', 'post_url',
                                                            'og_title', 'og_description', 'og_image'));
        }else
        return redirect()->route('news');
    }
}
