<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Genre;

class GenresController extends Controller
{
    //

    //add genre to book
	public function store(Book $book)
	{

		
		$book->addGenre(request('name'));

		//Genre::create([
		//	'name' => request('name')
		//
		//]);

		return back();

	}


}
