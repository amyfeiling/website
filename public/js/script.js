$(document).ready(function() {
	$('#regSubmit').on('click', function() {
		$("#registration-form").valid();
	});
	
	$('#login').on('click', function() {
		$("#login-form").valid();
	});
	
	$('#bookSubmit').on('click', function() {
		$("#add-book-form").valid();
	});
	//$("#registration-form").validate();
	
	$(function () {
	  var rating = $("#rateYo").data("rating");
	  $("#rateYo").rateYo({
		//rating: 1,
		rating: rating,
		fullStar: true
	  });
	});
	
	$(function () {
	  var $rateYo = $("#rateYo").rateYo();
 	   // rating clicked
	  $("#rateYo").click(function () {
		/* get rating */
		var rating = $rateYo.rateYo("rating");
		
 		// append rating at the end of Have Read a href
		$('.my_prefereneces a').attr( "href", function(ind,attr) {
			if(attr.search("rating") == -1) {
				return /\?/.test(attr) ? attr + '&rating=' + rating : attr + '?rating=' + rating;
			} else {
    			return attr.replace(/rating=\d+/gi, "rating="+rating);
      		}
		});
	  });
	});
 	
});
	
