<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('sort_order')->orderByDesc('id')->get();
        $categories = $galleries->pluck('category')->filter()->unique()->sort()->values();

        return view('gallery.index', compact('galleries', 'categories'));
    }

    public function manage()
    {
        $galleries = Gallery::orderByDesc('id')->paginate(24);

        return view('gallery.manage', compact('galleries'));
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:120',
            'category'    => 'required|string|max:40',
            'alt_text'    => 'nullable|string|max:160',
            'is_featured' => 'nullable|boolean',
            'image'       => 'required|image|max:4096',
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'title'       => $data['title'],
            'category'    => Str::slug($data['category']),
            'alt_text'    => $data['alt_text'] ?? $data['title'],
            'image_path'  => $path,
            'is_featured' => $request->boolean('is_featured'),
            'sort_order'  => (int) Gallery::max('sort_order') + 1,
        ]);

        return redirect()->route('gallery.manage')->with('status', 'Image uploaded.');
    }

    public function edit(Gallery $gallery)
    {
        return view('gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:120',
            'category'    => 'required|string|max:40',
            'alt_text'    => 'nullable|string|max:160',
            'is_featured' => 'nullable|boolean',
            'image'       => 'nullable|image|max:4096',
        ]);

        $payload = [
            'title'       => $data['title'],
            'category'    => Str::slug($data['category']),
            'alt_text'    => $data['alt_text'] ?? $data['title'],
            'is_featured' => $request->boolean('is_featured'),
        ];

        if ($request->hasFile('image')) {
            if (! Str::startsWith($gallery->image_path, ['http://', 'https://'])) {
                Storage::disk('public')->delete($gallery->image_path);
            }
            $payload['image_path'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update($payload);

        return redirect()->route('gallery.manage')->with('status', 'Image updated.');
    }

    public function destroy(Gallery $gallery)
    {
        if (! Str::startsWith($gallery->image_path, ['http://', 'https://'])) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return back()->with('status', 'Image deleted.');
    }
}