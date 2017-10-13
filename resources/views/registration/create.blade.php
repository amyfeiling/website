<?php

$thisPage = "Registration";

// function validateSession() {
//     if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"] === true) {
//         //can also verify USER_AGENT and IP are the same.
//         return true;
//     } else {
//         return false;
//     }
// }

?>


@extends('/layouts.default')
@section('content')

<section id="maincontent">
	<header id="pagetitle">Create Account</header>
	<article id="book_form">
		<form method="POST" action="/register" id="registration-form">
			
			{{ csrf_field() }}

			<p><label for="first_name">First Name:</label>
			<input type="text" id="first_name" name="first_name" placeholder="First Name" class="inputfield" maxlength="50" required value="" />
			</p>

			<p><label for="last_name">Last Name:</label>
			<input type="text" id="last_name" name="last_name" placeholder="Last Name" class="inputfield" maxlength="50" required value="" />
			</p>
			
			<p><label for="username">Username:</label>
			<input type="text" id="username" name="username" placeholder="Username" class="inputfield" maxlength="50" required value="" />
			</p>

			<p><label for="password">Password:</label>
			<input type="password" id="password" name="password" placeholder="Password" class="inputfield" maxlength="255" required value="" />
			</p>

			<p><label for="password_confirmation">Password Confirmation:</label>
			<input type="password" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation" class="inputfield" maxlengh="255" required value="" />
			</p>

			<input type="submit" value="Register" class="inputfield submit" id="regSubmit" />
		</form>
		<!--<p><h5>Password Requirements:</h5>
		<ul>
			<li>May contain letter and numbers</li>
			<li>Must contain at least 1 number and 1 letter</li>
			<li>May contain any of these characters: !@#$%</li>
			<li>Must be 10-50 characters</li>
		</ul>
		-->
		@include('/layouts.errors')
	</article>
</section>

@endsection