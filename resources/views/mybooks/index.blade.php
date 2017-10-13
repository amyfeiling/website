<?php

use App\Resources\Views;

$thisPage = "My Books";


$user_id = Auth::user()->id;

$myToRead = \App\MyBooks::where('user_id', '=', $user_id)->where('status', '=', 'To Read')->get();

$myHaveRead = \App\MyBooks::where('user_id', '=', $user_id)->where('status', '=', 'Have Read')->get();

?>


@extends('layouts.sidebar')
@section('content')

<section id="maincontent">
	<header id="pagetitle">To Read</header>
	<article>
		<ul class="book_links">
		
		@if(count($myToRead)>0)
	
			@foreach($myToRead as $mybook)	
				<li>
					<a href="/books/{{ $mybook->book->id }}"><img src="images/{{ $mybook->book->book_image }}" width="110" height="160" /></a><br />
					<section class="rating_bar">
						<section class="rating" style=""></section>
					</section>
				</li>
			@endforeach
		@else
				<li>No books To Read.</li>
		@endif
		</ul>
	</article>


	<header id="pagetitle">Have Read</header>
	<article>
		<ul class="book_links">

		@if(count($myHaveRead)>0)

			@foreach($myHaveRead as $mybook) 

				<li>
					<a href="/books/{{ $mybook->book->id }}"><img src="images/{{ $mybook->book->book_image }}" width="110" height="160" /></a><br />
					<section class="rating_bar">
						<section class="rating" style=""></section>
					</section>
				</li>
			@endforeach
		@else
			<li>Need to read a book.</li>
		@endif
		</ul>
	</article>
</section>

@stop