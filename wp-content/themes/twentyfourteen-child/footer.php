<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
      <footer id='main-footer' role='contentinfo'>
        <div class='footer-content-wrap'>
          <div class='show-for-print content-row' id='subscribe-ad'>
            <div class='grid-2-per add-space-b'>
              <div class='content-row'>
                <h2 class='section-title sans center'>
                  <span>
                    Free
                  </span>
                  Home Subscription
                </h2>
                <hr class='partial thick'>
              </div>
              <div class='content-row'>
                <div class='grid-element'>
                  <div class='image-content'>
                    <img alt='genome is the bomb-diggety' src='<?php echo get_stylesheet_directory_uri(); ?>/img/content/subscription-placeholder.jpg'>
                  </div>
                </div>
                <div class='grid-element serif'>
                  <p class='lead emph'>
                    Quarterly Print Edition
                  </p>
                  <p>
                    Quisque aliquam adipiscing arcu. Mauris vel nisi eget turpis feugiat sollicitudin sit amet eu elit. Donec nec purus nisl. Nulla vitae mi erat. Aenean faucibus, ligula eu consectetur porta.
                  </p>
                  <p class='lead italic small-block'>
                    Subscribe online at:
                    <a href='http://genomemag.com'>
                      www.genomemag.com
                    </a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class='content-row add-space-b'>
            <p class='highlight center add-space-g'>
              Genome explores the world of personalized medicine and the genomic revolution that makes it possible, empowering you to make informed health decisions that will help you live better, longer.
              <a class='small-block show-for-print' href='http://genomemag.com'>
                www.genomemag.com
              </a>
            </p>
          </div>
          <div class='content-row footer-site-map'>
            <div class='col'>
              <ul>
                <li>
                  <a href='http://link/…'>About Genome</a>
                </li>
                <li>
                  <a href='http://link/…'>Partners & Allies</a>
                </li>
                <li>
                  <a href='http://link/…'>Media Kit</a>
                </li>
              </ul>
            </div>
            <div class='col'>
              <ul>
                <li>
                  <a href='http://link/…'>Privacy Kit</a>
                </li>
                <li>
                  <a href='http://link/…'>Terms & Conditions</a>
                </li>
                <li>
                  <a href='http://link/…'>Contact Us</a>
                </li>
              </ul>
            </div>
            <div class='col'>
              <ul class='social-list inline'>
                <li>
                  <a data-icon='u' href='http://link/…'></a>
                </li>
                <li>
                  <a data-icon='v' href='http://link/…'></a>
                </li>
                <li>
                  <a data-icon='w' href='http://link/…'></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
    <!-- / window.jQuery || document.write('<script src="../js/libs/jquery.min.js"><\/script>') -->
    <script src='<?php echo get_stylesheet_directory_uri(); ?>/js/min/app.min.js'></script>
    <script src='<?php echo get_stylesheet_directory_uri(); ?>/js/min/sitescripts.min.js'></script>
    <?php if ( !is_page_template('page-templates/feature-article.php') ) : ?>
    <script src='//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-509d72c21cd49086'></script>
    <script>
      var addthis_config = {"data_track_addressbar":true};
    </script>
    <?php endif; ?>
    <script>
      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
  <?php wp_footer(); ?>
  </body>
</html>