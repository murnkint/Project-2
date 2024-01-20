<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    
    public function list()
    {
        $items = Book::orderBy('name', 'asc')->get();
 
        return view(
            'books.list',
            [
                'title' => 'Books',
                'items' => $items
            ]
        );
    }

    public function create()
    {
        $authors = Author::orderBy('name', 'asc')->get();

        return view(
            'books.form',
            [
                'title' => 'Add book',
                'book' => new Book(),
                'authors' => $authors,
            ]
        );  
    }

    public function update(Book $book)
    {
        $authors = Author::orderBy('name', 'asc')->get();
    
        return view(
            'books.form',
            [
                'title' => 'Edit book',
                'book' => $book,
                'authors' => $authors,
            ]
        );
    }

    private function saveBookData(Book $book, BookRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:256',
            'author_id' => 'required',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            'year' => 'numeric',
            'image' => 'nullable|image',
            'display' => 'nullable'
        ]);

        $book->name = $validatedData['name'];
        $book->author_id = $validatedData['author_id'];
        $book->description = $validatedData['description'];
        $book->price = $validatedData['price'];
        $book->year = $validatedData['year'];
        $validatedData = $request->validated();
        $book->fill($validatedData);
        $book->display = (bool) ($validatedData['display'] ?? false);
        
        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $extension = $uploadedFile->clientExtension();
            $name = uniqid();
            $book->image = $uploadedFile->storePubliclyAs(
                '/',
                $name . '.' . $extension,
                'uploads'
            );
        }
        $book->save();
    
    }

    public function put(BookRequest $request)
    {
        $book = new Book();
        $this->saveBookData($book, $request);
        return redirect('/books');
    }

    public function patch(Book $book, BookRequest $request)
    {
        $this->saveBookData($book, $request);
        return redirect('/books/update/' . $book->id);
    }

    public function delete(Book $book)
    {
        $book->delete();
        return redirect('/books');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

}
