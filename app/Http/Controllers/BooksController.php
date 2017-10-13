<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Book;


class BooksController extends Controller
{

    //
    public function __construct()
    {

        $this->middleware('auth')->except(['index', 'search']);

        //$this->middleware('auth');
    }


    public function index()
    {
		// /books


        //$books = DB::table('books')->latest()->get();
		$books = Book::all();

		return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {

    	// GET /books/id

        //$book = DB::table('books')->find($id);
		//$book = Book::find($id);

		return view('books.show', compact('book'));
    }

    public function create()
    {
        // /books/create

        return view('books.create');
    }

    public function store(Request $request)
    {

        // POST /books

        //Validate form
        $this->validate($request, [
            'title' => 'required|max:50',
            'author' => 'required|max:50',
            'description' => 'required|max:65535',
            'bookImage' => 'required|mimes:jpeg,png,jpg,gif|image',
            'genre' => 'required'
        ]);


        auth()->user()->publish(new Book(request(['title', 'author', 'description', 'bookImage'])));
        //Create a new book using request data
        /*$book = new Book;

        $book->title = request('title');
        $book->author = request('author');
        $book->description = request('description');
        $book->book_image = request('bookImage')->getClientOriginalName();
        $book->user_id = auth()->id();        


        //Save to database
        $book->save();
        */


        $genres = request('genre');
        $book->addGenre($genres);

        //dd($genres);
        // foreach($genres as $genre) 
        // {
        //     //echo($genre);
        //     $book->addGenre($genre);
        // }

        //dd();
        //Redirect to home page
        return redirect('/');

    }

    public function edit($id)
    {

        // GET /books/id/edit

    }


    public function update(Request $request, $id)
    {

        // PATCH /books/id
    }

    public function destroy($id)
    {

        // DELETE /books/id
    }


    public function recent()
    {
        // /books


        //$books = DB::table('books')->latest()->get();
        $books = Book::latest()->limit(20)->get();

        return view('books.index', compact('books'));
    }


    public function search(Request $request) {

        // Sets the parameters from the get request to the variables.
        $title = request('title');
        $author = request('author');
        $genre = request('genre');

        $query = null;

        if($genre != 'Genre')
        {

            $query = Book::with(['genres' => function ($query) {
                $query->where('genre', '=', request('genre'));
                }])
                    ->whereHas('genres',function( $query ){
                    $query->where('genre',request('genre'));
            })
                ->where('title', 'like', '%'.$title.'%')
                ->where('author', 'like', '%'.$author.'%');

        }
        else
        {

            $query = Book::where('title', 'like', '%'.$title.'%')
                ->where('author', 'like', '%'.$author.'%');

        }

        $books = $query->get();

        //dd($books);

        return view('books.index', compact('books'));
    }


    public function myBooks(Request $request)
    {
        $status = request('status');
        

        $books = Book::with(['myBooks' => function ($query) {
                $query->where('status', '=', request('status'))
                ->where('user_id', 1);
                //->whereNotNull('rating');
                }])
                    ->whereHas('myBooks',function( $query ){
                    $query->where('status',request('status'))
                    ->where('user_id', 1);
                    //->whereNotNull('rating');
            })
            ->get();

            //echo(request('status'));
        //dd($books);
        return view('books.index', compact('books'));
    }

    public function reviews()
    {

        //$books = Book::latest()->limit(20)->get();
        //$books = Book::with('my_books')->get();
        //$avg = $books->resourcesCount->sum('aggregate')/count($bucket->resourcesCount);

        // $avgStar = Book::with(['myBooks' => function($query) {
        //     $query->avg('rating');
        // }])->get();

        // $books = Book::with(['myBooks' => function ($query) {
        //     $query->whereNotNull('rating');
        // }])->get();
        

        // dd($books->myBooks);

        $books = Book::with('myBooks')->get();

        $books = $books->map(function ($item) {
        foreach ($item as $book) {
            foreach($item->myBooks as $rating) {
                echo $item->myBooks;
            }
           // $item->rating{$i} = $item->rating->whereNotNull('rating')->avg();
            //}
        }
    });

        dd("hello");

        return view('books.index', compact('books'));
    }

}
