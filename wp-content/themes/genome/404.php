<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>


	<div id='site-wrap-inner'>
    <main id='content-wrap' role='main'>
      <div class='inner-bounds remove-footer-offset block'>
        <header class='section-header add-bleed'>
          <h2 class='section-title left smaller'>
						404: Not Found
					</h2>
          <hr class='neutral-bg'>
        </header>
      </div>
	    <div class='inner-bounds background-white card-block'>
	      <div class='content-row'>
	        <h2 class='section-title left smaller'>
	          It looks like nothing was found at this location. Maybe try a search?
	        </h2>
	        <div id="inline-search-box"  class='form-box'>
	          <form role='search' method='get' action='<?php echo site_url(); ?>'>
	            <input class='input-icon' data-icon='C' type='submit' value='Search'>
	            <input id='search' name='s' placeholder='What were you looking for?' type='text'>
	          </form>
	        </div>
	      </div>
	    </div>
		</main>
	</div>

<?php
get_footer();
