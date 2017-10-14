<?php 

$thisPage = "Home";

?>
@extends('layouts.default')
@section('content')
<section id="maincontent">
	
	<article class="spotlight">
		<header class="subsection">TOP REVIEWS</header>
		<a href="/books/reviews"><img src="./images/top_reviews.jpg" /></a>
	</article>
	
	<article class="spotlight">
		<header class="subsection">RECENTLY ADDED</header>
		<a href="/books/recent"><img src="./images/recently_added.jpg" /></a>
	</article>
	
	@if(Auth::check())
	
	<article class="spotlight">				
		<header class="subsection">MY BOOKS</header>
		<a href="/mybooks"><img src="./images/my_books.jpg" /></a>
	</article>

	@else
	
	<article class="spotlight">		
		<header class="subsection">SIGN IN</header>
		<section id="signin">
			<form method="POST" action="/login" id="login-form">
				{{ csrf_field() }}
				<input type="text" name="username" placeholder="Username" class="inputfield" maxlength="50" required value="" />
				
				<input type="password" name="password" placeholder="Password" class="inputfield" maxlength="50" required />
				
				<input type="submit" id="login" class="inputfield submit" value="Login" />

			</form>
			<a href="/register" id="signin_newuser">New User</a>
		</section>
	</article>

	@endif
	
</section>
@stop