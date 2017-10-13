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


$book_id = $book->id;
$user_id = Auth::user()->id;

$mybooks = \App\MyBooks::where('book_id', '=', $book_id)->where('user_id', '=', $user_id)->first();

//echo($mybooks->status);
$rating = ($mybooks->rating/5)*100;

?>


@extends('layouts.sidebar')
@section('content')

<section id="maincontent">
	
	<header id="pagetitle">{{ $book->title }}</header>
	
	<article id="book_cover">
		<img src="/images/{{ $book->book_image }}" />
	</article>
	
	<article id="book_info">
		<p><strong>Author:</strong> {{ $book->author }}</p>
		
		<p><strong>Genre(s):</strong> 
		
		@foreach($book->genres as $genre)
			
			{{ $loop->first ? '' : ', ' }}
			{{$genre->genre}}
		
		@endforeach
		
		</p>
		
		<section id="book_desc"><strong>Description:</strong>
			{{ $book->description }} <br />
		</section>

		@if(Auth::check())

		<!--<section class="rating_bar">
			<section class="rating" style="width:{{ $rating }}%"></section>
		</section>-->

		<div id="rateYo" data-rating=""></div>
		
		<section class="my_prefereneces">
		
			@if (empty($mybooks))
			
			<a href="/mybooks/status?status=To Read&book_id={{ $book_id }}">To Read</a> |
			<a  href="/mybooks/status?status=Have Read&book_id={{ $book_id }}">Have Read</a>

			@elseif($mybooks->status == 'To Read')

			<a  href="/mybooks/status?status=Have Read&book_id={{ $book_id }}">Have Read</a>

			@endif

		
		</section>
		
		@endif

	</article>

</section>

@stop