<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::query()
                ->select('id', 'title', 'author', 'genre', 'isbn', 'published_at', 'publisher')
                ->paginate(15)
                ->withQueryString();
            
        return Inertia::render('Admin/Books/Index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Books/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'genre' => 'required',
            'image' => 'required',
            'published_at' => 'required',
            'publisher' => 'required',
            'description' => 'required'
        ]);

        if($request->file('image')){
            $path = Storage::putFile('books', $request->file('image'));
        }
        Book::create([
            'title' => $request->title,
            'slug' => Str::of($request->title)->slug('-'),
            'author' => $request->author,
            'isbn' => $request->isbn,
            'image' => $path,
            'genre' => $request->genre,
            'published_at' => $request->published_at,
            'publisher' => $request->publisher,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Inertia::render('Admin/Books/Edit', [
            'book' => Book::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'genre' => 'required',
            'published_at' => 'required',
            'publisher' => 'required',
            'description' => 'required'
        ]);

        if($request->file('image')){
            $path = Storage::putFile('books', $request->file('image'));
        }
        Book::where('id', $id)->update([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'image' => isset($path) ? $path : $request->old_image,
            'genre' => $request->genre,
            'published_at' => $request->published_at,
            'publisher' => $request->publisher,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::destroy($id);

        return redirect()->back()->with('success', 'Deleted');
    }
}
