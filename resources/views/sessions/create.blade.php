<?php

$thisPage = "Login";

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

<header class="subsection">SIGN IN</header>
<section id="signin">
	<form method="POST" action="/login" id="login-form">
		{{ csrf_field() }}
		<input type="text" name="username" placeholder="Username" class="inputfield" maxlength="50" required value="" />
		
		<input type="password" name="password" placeholder="Password" class="inputfield" maxlength="50" required />
		
		<input type="submit" id="login" class="inputfield submit" value="Login" />

	</form>
	<a href="registration.php" id="signin_newuser">New User</a>
	
</section>

@include('/layouts.errors')

@endsection