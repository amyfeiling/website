<?php

// Prints selected for given key
// function selected($field, $key) {	
// 	if(isset($field) && $field == $key){
// 		echo 'selected';
// 	}
// }


?>

<aside>
	<header class="subsection" id="sidenav_header">SEARCH</header>
	<section id="sidenav">
		<form method="GET" action="/books/search">
			{{ csrf_field() }}
			
			<label for="genre">Genre:<br /></label>
			
			<select id="genre" name="genre" class="inputfield">
				<option>Genre</option>
				
				@for($i=0; $i< count($genres); $i++)
				<option >{{ $genres[$i] }}</option>
				@endfor

			</select></br />
			
			<label for="author">Author:<br /></label>
			
			<input type="text" id="author" name="author" placeholder="Author" class="inputfield" maxlength=50; value="" /><br />
			
			<label for="title">Title:<br /></label>
			
			<input type="text" id="title" name="title" placeholder="Title" class="inputfield" maxlength=50; value="" />
			
			<input type="submit" id="search" value="Search" class="inputfield submit" />
		</form>
	</section>
</aside>
