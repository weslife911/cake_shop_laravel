<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    //
    function add_blog_view() {
        $categories = Category::all();
        return view("pages.admin.add_blog", ["categories"=> $categories]);
    }

    function add_blog(Request $request) {
        $validator = Validator::make($request->all(), [
            'blogTitle' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'introductionText' => ['required', 'string'],
            'mainImage' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'mainContent' => ['required', 'string'],
            'serves' => ['nullable', 'string', 'max:255'],
            'prepTime' => ['nullable', 'integer', 'min:0'],
            'cookTime' => ['nullable', 'integer', 'min:0'],
            'ingredients' => ['nullable', 'array'],
            'ingredients.*' => ['nullable', 'string'],
            'directions' => ['nullable', 'array'],
            'directions.*' => ['nullable', 'string'],
            'blogTags' => ['nullable', 'string', 'max:255'],
        ]);

        if($validator->fails()) {
            flash()->error($validator->errors()->first());
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
        }

        $mainImagePath = null;
        if ($request->hasFile('mainImage')) {
            $mainImagePath = $request->file('mainImage')->store('blog_main_images', 'public');
        }

        $validatedData = $validator->validated();

        $blog = Blog::create([
            'blogTitle' => $validatedData['blogTitle'],
            'category_id' => $validatedData['category_id'],
            'image' => $imagePath,
            'introductionText' => $validatedData['introductionText'],
            'mainImage' => $mainImagePath,
            'mainContent' => $validatedData['mainContent'],
            'serves' => $validatedData['serves'],
            'prepTime' => $validatedData['prepTime'],
            'cookTime' => $validatedData['cookTime'],
            'ingredients' => $validatedData['ingredients'] ?? [],
            'directions' => $validatedData['directions'] ?? [],
            'blogTags' => $validatedData['blogTags'] ?? null,
        ]);

        if(!$blog) {
            flash()->error('Error while adding blog');
        }

        return redirect()->route('admin.add.blog');

    }

    function blog_view() {
        $blogs = Blog::all();
        return view("pages.common.blogs", ["blogs" => $blogs]);
    }
}
