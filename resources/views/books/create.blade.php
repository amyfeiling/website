<?php

use App\Resources\Views;
//use App\Genre;

$thisPage = "Add Books";

// function validateSession() {
// if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"] === true) {
// //can also verify USER_AGENT and IP are the same.
// return true;
// } else {
// return false;
// }
// }

$genres = array('Biography', 'Children', 'Classics', 'Crime', 'Fantasy', 'Fiction', 'Historical Fiction', 'History',
            'Mystery', 'Non-Fiction', 'Religion', 'Romance', 'Science Fiction', 'Suspense', 'Thriller', 'Young Adult');


/*if(!validateSession()) {
// redirect them to login page.
$errors['message'] = "You must login first.";
redirectError("index.php", $errors);
}*/

?>

@extends('/layouts.sidebar')
@section('content')
<section id="maincontent">
	
	<header id="pagetitle">Add Books</header>
	
	<article id="book_form">
		
		<form method="POST" action="/books" enctype="multipart/form-data" id="add-book-form">
			{{ csrf_field() }}

			<p>
				<label for="title">Title:</label>
				<input type="text" id="title" name="title" placeholder="Title" class="inputfield" maxlength="50" value="" required />

			</p>
			
			<p>
				<label for="author">Author:</label>
				<input type="text" id="author" name="author" placeholder="Author" class="inputfield" maxlength="50" value="" required />

			</p>
			
			<fieldset>
				<legend>Genre(s):</legend>
				<ul class="genre_checkbox multicol">
					
					@for($i=0; $i< count($genres); $i++)
					
					<li>
						<label for="{{ $genres[$i] }}">
							<input type="checkbox" id="{{ $genres[$i] }}" name="genre[]" value="{{ $genres[$i] }}" />{{ $genres[$i] }}
						</label>
					</li>

					@endfor
				
				</ul>
				</ul>

			</fieldset>
			
			<p>
				<label for="description">Description:</label>
				<textarea id="description" name="description" maxlength="65535" cols="50" rows="10" placeholder="Brief Book Description (65535 characters)" class="inputfield" required></textarea>

			</p>
			
			<p>
				<label for="book_image">Book Image:</label>
				<input type="file" id="book_image" name="bookImage" accept="image/*" class="inputfield"  required />

			</p>

			<input type="submit" name="submit" value="Submit" class="inputfield submit" id="bookSubmit" />
		</form>

		@include('layouts.errors')
	
	</article>

</section>

@stop