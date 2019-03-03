<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Requests\BookRequest;
use Storage;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $books = Book::paginate(5);

        return view('books.index', ['books' => $books]);

        // dd($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::all();

        return view('books.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('cover')) {
            $input['cover'] = $request->cover->store('book-cover', 'public');
        }
        Book::create($input);

        return redirect()->route('book.index')->with('success', 'Saved data !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('books.detail', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = \App\Category::all();

        return view('books.edit', ['book' => $book, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $book = Book::findOrFail($id);  
        $input = $request->all();

        // if request has file cover
        if ($request->hasFile('cover')) {
            // delete old file cover
            if (isset($book->cover) && file_exists(storage_path('app/public/'.$book->cover))) {
                Storage::delete('public/'.$book->cover);
            }          

            // then upload new file cover
            $input['cover'] = $request->cover->store('book-cover', 'public');
        }

        $book->update($input);

        return redirect()->route('book.index')->with('info', 'Updated data !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if (isset($book->cover) && file_exists(storage_path('app/public/'.$book->cover))) {
            Storage::delete('public/'.$book->cover);
        }

        $book->delete();

        return redirect()->route('book.index')->with('info', 'Deleted data !');
    }

}
