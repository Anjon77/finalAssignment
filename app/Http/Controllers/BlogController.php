<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function blogPage_index()
    {
        // Fetch blog posts
        $blogs = Blog::latest()->paginate(8);
        // Truncate content for each blog post
        $blog_content_limit = [];
        foreach ($blogs as $blog) {
            $blog_content_limit[$blog->id] = Str::limit($blog->content, 20, '...');
        }

        return view('frontend.pages.blog', [
            'blogs' => $blogs,
            'blog_content_limit' => $blog_content_limit
        ]);
    } // End of homePageBlog_index

    public function blogPage_show($id)
    {
        $categories = Category::all();
        $blog = Blog::findOrFail($id);
        return view('frontend.pages.single_blog', compact('blog', 'categories'));
    }

    public function index()
    {
        $categories = Category::all();
        $blogs = Blog::all();
        return view('backend.owner.blog.list', [
            'categories' => $categories,
            'blogs' => $blogs
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.owner.blog.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        //Validation
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //Image Upload
        $filename = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->image = $filename;
        $blog->category_id = $request->category_id;
        $blog->user_id = auth()->id();

        $blog->save();

        return redirect()->route('blogs.list')->with('success', 'Blog Created Successfully');
    }

    public function show($id)
    {

        $blog = Blog::findOrFail($id);
        if ($blog) {
            $userName = $blog->user->first_name;
        }
        return view('backend.owner.blog.show', compact('blog', 'userName '));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $blog = Blog::findOrFail($id);
        return view('backend.owner.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {

        // Find the blog
        $blog = Blog::findOrFail($id);

        // dd($request->all());
        // Validation
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the blog
        $blog = blog::findOrFail($id);

        // Check if a new image is being uploaded
        if ($request->hasFile('image')) {
            // Move the new image to the desired location
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);

            // Unlink the old image if it exists
            if ($blog->image) {
                $oldImagePath = public_path('images') . '/' . $blog->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Update the blog with the new image file name
            $blog->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $filename,
            ]);
        } else {
            // No new image, update other fields
            $blog->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }
        return redirect()->route('blogs.list')->with('success', 'Blog Updated Successfully');
    }

    public function destroy($id)
    {
        // Find blog $id
        $blog = Blog::findOrFail($id);
        //blog Delete
        $blog->delete();
        return redirect()->back()->with('success', 'Blog Deleted Successfully');
    }
}
