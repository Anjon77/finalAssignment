<?php

namespace App\Http\Controllers;

use App\Models\Plugin;
use App\Models\Category;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $plugins = Plugin::all();
        return view('backend.owner.plugin.list', [
            'categories' => $categories,
            'plugins' => $plugins
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.owner.plugin.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        //Validation
        $request->validate([
            'plugin_title' => 'required',
            'plugin_content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required'
        ]);

        //Image Upload
        $filename = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
        }

        $plugin = new Plugin();
        $plugin->plugin_title = $request->plugin_title;
        $plugin->plugin_content = $request->plugin_content;
        $plugin->image = $filename;
        $plugin->category_id = $request->category_id;
        $plugin->user_id = auth()->id();

        $plugin->save();

        return redirect()->route('plugins.list')->with('success', 'Plugin Created Successfully');
    }

    public function show($id)
    {
        $plugin = Plugin::findOrFail($id);
        return view('backend.owner.plugin.show', compact('plugin'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $plugin = Plugin::findOrFail($id);
        return view('backend.owner.plugin.edit', compact('plugin', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Find the plugin
        $plugin = Plugin::findOrFail($id);

        // Validation
        $request->validate([
            'plugin_title' => 'required',
            'plugin_content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required'
        ]);

        // Check if a new image is being uploaded
        if ($request->hasFile('image')) {
            // Move the new image to the desired location
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);

            // Unlink the old image if it exists
            if ($plugin->image) {
                $oldImagePath = public_path('images') . '/' . $plugin->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Update the plugin with the new image file name
            $plugin->update([
                'plugin_title' => $request->plugin_title,
                'plugin_content' => $request->plugin_content,
                'image' => $filename,
                'category_id' => $request->category_id,
            ]);
        } else {
            // No new image, update other fields
            $plugin->update([
                'plugin_title' => $request->plugin_title,
                'plugin_content' => $request->plugin_content,
                'category_id' => $request->category_id,
            ]);
        }

        return redirect()->route('plugins.list')->with('success', 'Plugin Updated Successfully');
    }


    public function destroy($id)
    {
        // Find plugin $id
        $plugin = Plugin::findOrFail($id);
        //plugin Delete
        $plugin->delete();
        return redirect()->back()->with('success', 'Plugin Deleted Successfully');
    }
}
