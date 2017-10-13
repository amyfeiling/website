<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyBooks;

class MyBooksController extends Controller
{
    //

    public function __construct()
    {

        $this->middleware('auth');

        //$this->middleware('auth');
    }
    

    public function index()
    {

    	$mybooks = MyBooks::all();

		return view('mybooks.index', compact('mybooks'));
    }


    public function show(Request $request)
    {

		return view('mybooks.show');
    }


    public function store(Request $request)
    {

        $book_id = request('book_id');
        $user_id = auth()->id();
        $status = request('status');

        $mybooks = new MyBooks;

        //check user and book already in db
        $temp = MyBooks::where('user_id', '=', $user_id)->where('book_id', '=', $book_id)->get();
        //dd(count($temp));

        //if true -- add entry
        if(count($temp)==0)
        {
            $mybooks->status = $status;
            $mybooks->user_id = $user_id;
            $mybooks->book_id = $book_id;

            //Save to database
            $mybooks->save();
        }
        else        //update existing entry
        {
            MyBooks::where('user_id', '=', $user_id)->where('book_id', '=', $book_id)->update(['status' => $status]);
        }
        

        //Redirect
        return redirect('/mybooks');

    }


    public function reviews()
    {

        $mybooks = MyBooks::selectRaw("
                                 book_id,
                                (avg(rating)/5)*100 as rating
                                ")->whereNotNull('rating')->groupBy('book_id')->orderBy('rating', 'desc')->get();

        
        //dd($mybooks);

        return view('/mybooks.reviews', compact('mybooks'));
    }


}
