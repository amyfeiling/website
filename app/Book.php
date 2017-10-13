<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Closure;

class Book extends Model
{
    //

    public function user()
    {

        return $this->belongsTo(User::class);

    }


    public function genres()
    {

    	return $this->hasMany(Genre::class);


    }

    public function myBooks()
    {

        return $this->hasMany(MyBooks::class);

    }


    public function addGenre($genres)
    {

       	foreach($genres as $genre) 
        {
            $this->genres()->create(compact('genre'));
        }

    	//$this->genres()->create(compact('name'));

  //    	Genre::create([
		//  	'name' => $name,
		//  	'book_id => $this.id'
		// ]);
    }

    


    
}
