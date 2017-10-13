<?php

use App\Resources\Views;

$thisPage = "Search";

// function validateSession() {
//     if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"] === true) {
//         //can also verify USER_AGENT and IP are the same.
//         return true;
//     } else {
//         return false;
//     }
// }

?>


@extends('layouts.sidebar')
@section('content')

<section id="maincontent">
	
	<header id="pagetitle">Book Results</header>
	
	<article>
		
		<ul class="book_links">
			
			@foreach($books as $book)
			<li>
				<a href="/books/{{ $book->id }}"><img src="/images/{{ $book->book_image }}" width="110" height="160" /></a><br />
				<section class="rating_bar">
					<section class="rating" style=""></section>
				</section>
			</li>	
			@endforeach

		</ul>

	</article>
	
</section>

@stop