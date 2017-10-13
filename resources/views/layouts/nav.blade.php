<?php
	
	
	$navigation = array( 'Home' => '/',
						'Search' => '/books',
						'My Books' => '/mybooks',
						'Add Books' => '/books/create');

?>

<header>
	<a href="/"><img src="/images/logo.jpg" id="logo" /></a>
	<h1>FEILING BOOKS</h1>
</header>		
<nav>
	<ul id="navlinks">
		
		@foreach($navigation as $name => $link)
				
				<li><a href="{{ $link }}" <?php if($thisPage == $name) echo "class=\"active\"" ?>>{{ $name }}</a></li>

		@endforeach
			
		@if(Auth::check())

			<li class="navlogin"><a href="/logout">Logout</a></li>

		@endif

		@if(Auth::check())
			
			<li class="navlogin">Welcome: {{ Auth::user()->first_name }} </li>
		
		@else
		
			<li class="navlogin">Welcome: Guest</li>
		
		@endif
	</ul>
</nav>

