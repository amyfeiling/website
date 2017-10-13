<header class="subheading" id="genres">Genres</header>

<ul class="footlinks multicol">	
	@for($i=0; $i< count($genres); $i++)
		
	<li><a href="/books/search?genre=<?= $genres[$i] ?>">{{ $genres[$i] }}</a></li>

	@endfor
</ul>
	
<header class="subheading" id="mybooks">My Books</header>
			
<ul class="footlinks">
	@for($i=0; $i< count($my_books); $i++)
				
	<li><a href="/mybooks/{{ $my_books[$i] }}">{{ $my_books[$i] }}</a></li>

	@endfor
	
	<li>&nbsp;</li>
</ul>

<section id="copyright">Copyright &copy 2016 Feiling Books</section>