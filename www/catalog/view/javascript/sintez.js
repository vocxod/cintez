/* sintez.js */

$(document).ready(function(){
    $("#dropdownleft").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
    //
	// Language
	$('#form-language .language-select').on('click', function(e) {
		e.preventDefault();

		$('#form-language input[name=\'code\']').val($(this).attr('name'));

		$('#form-language').submit();
	});

	// Zone
	$('#form-zone .zone-select').on('click', function(e) {
		e.preventDefault();

		$('#form-zone input[name=\'code\']').val($(this).attr('name'));

		console.log( "FORM-ZONE: ", $('#form-zone input[name=\'code\']').val($(this).attr('name')) );
		
		$('#form-zone').submit();
	});   
});


