jQuery(document).ready(function($) {

  $(document).foundation();


  
  



  // Remove empty P tags created by WP inside of Accordion and Orbit
  $('.accordion p:empty, .orbit p:empty').remove();

	// Makes sure last grid item floats left
	$('.archive-grid .columns').last().addClass( 'end' );

	// Adds Flex Video to YouTube and Vimeo Embeds
  $('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function() {
    if ( $(this).innerWidth() / $(this).innerHeight() > 1.5 ) {
      $(this).wrap("<div class='widescreen flex-video'/>");
    } else {
      $(this).wrap("<div class='flex-video'/>");
    }
  });

});
