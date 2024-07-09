<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'content' => 'required|json',
            'thumbnail' => 'nullable|image|max:2048',
            'homepage' => 'nullable|string|max:255',
            'zip' => 'required|string|max:10',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255', // Validierung für Adresse hinzugefügt
            'custom_special' => 'nullable|array', // Validierung für custom_special hinzugefügt
        ]);

        $blog = new Blog();
        $blog->user_id = Auth::id(); // Setzt die ID des authentifizierten Benutzers
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->content = $request->content;
        $blog->address = $request->address;
        $blog->zip = $request->zip;
        $blog->city = $request->city;
        $blog->homepage = $request->homepage; // Zuweisung für Homepage hinzugefügt
        $blog->custom_special = $request->custom_special;
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $blog->thumbnail = $path;
        }

        $blog->save();

        return response()->json(['message' => 'Blog erfolgreich erstellt.']);
    }
}