<?php

use App\Resources\Views;

$thisPage = "My Books";

$user_id = Auth::user()->id;

$mybooks = \App\MyBooks::where('user_id', '=', $user_id)->where('status', 'like', '%'.request('status').'%')->orderby('status')->get();


?>


@extends('layouts.sidebar')
@section('content')

<section id="maincontent">

	<header id="pagetitle">{{ request('status') }}</header>
	<article>
		<ul class="book_links">
	
			@foreach($mybooks as $mybook)

			<li>
				<a href="/books/{{ $mybook->book->id }}"><img src="/images/{{ $mybook->book->book_image }}" width="110" height="160" /></a><br />
				<section class="rating_bar">
					<section class="rating" style=""></section>
				</section>
			</li>

			@endforeach

		</ul>
	</article>

</section>


@stop