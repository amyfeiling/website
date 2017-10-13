<?php

$genres = array('Biography', 'Children', 'Classics', 'Crime', 'Fantasy', 'Fiction', 'Historical Fiction', 'History', 'Mystery', 'Non-Fiction', 'Religion', 'Romance', 'Science Fiction', 'Suspense', 'Thriller', 'Young Adult');
                    
$my_books = array('To Read', 'Have Read');

?>


<!doctype html>
<html>
<head>
    @include('layouts.header')
</head>
<body>
<div class="container">

    @include('layouts.nav')

    <div id="main" class="row">

            @yield('content')

    </div>

    <footer class="row">
        @include('/layouts.footer')
    </footer>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- JQuery validation plugin (http://plugins.jquery.com/validation/) included from Microsoft CDN -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
    
<!-- CSS and JS for Star Ratings -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.1.1/jquery.rateyo.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.1.1/jquery.rateyo.min.js"></script>

<!-- My JS File -->
<script src="/js/script.js"></script>
    
</body>
</html>