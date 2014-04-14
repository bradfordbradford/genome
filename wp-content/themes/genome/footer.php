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
                    <img alt='genome is the bomb-diggety' src='<?php echo get_stylesheet_directory_uri(); ?>/img/content/subscription-ad.jpg'>
                  </div>
                </div>
                <div class='grid-element serif'>
                  <p class='lead emph'>
                    Subscribe to <em>Genome</em> magazine!
                  </p>
                  <p>
                    <em>Genome</em> is a quarterly print magazine that covers personalized medicine and the genomic revolution that makes it possible.
                    Your <em>Genome</em> subscription will include four issues each year delivered to your home for free.
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
          <div class='content-row add-space-b hide-below-tablet-p'>
            <p class='highlight white-text-color center add-space-g'>
              <em>Genome</em> explores the world of personalized medicine and the genomic revolution that makes it possible, empowering you to make informed health decisions that will help you live better, longer.
              <a class='small-block show-for-print' href='http://genomemag.com'>
                www.genomemag.com
              </a>
            </p>
          </div>
          <div class='content-row footer-site-map'>
            <div class='col'>
              <ul>
                <li>
                  <a href='<?php echo site_url(); ?>/about-us/'>About Us</a>
                </li>
                <li>
                  <a href='<?php echo site_url(); ?>/partners-and-allies/'>Partners & Allies</a>
                </li>
                <li>
                  <a href='http://issuu.com/genomemag/docs/bsm_mediakit_booklet_040914_05'>Media Kit</a>
                </li>
              </ul>
            </div>
            <div class='col'>
              <ul>
                <li>
                  <a href='<?php echo site_url(); ?>/privacy-policy/'>Privacy Policy</a>
                </li>
                <li>
                  <a href='<?php echo site_url(); ?>/terms-and-conditions/'>Terms & Conditions</a>
                </li>
                <li>
                  <a href='<?php echo site_url(); ?>/contact/'>Contact Us</a>
                </li>
              </ul>
            </div>
            <div class='col'>
              <ul class='social-list inline'>
                <li>
                  <a data-icon='u' target='_blank' href='http://facebook.com/genomemag'></a>
                </li>
                <li>
                  <a data-icon='v' target='_blank' href='http://twitter.com/genomemag'></a>
                </li>
                <li>
                  <a data-icon='w' target='_blank' href='http://linkedin.com/company/big-science-media'></a>
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
  <script src='//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5339b4d16c709f80'></script>
  <script>
    var addthis_config = {"data_track_addressbar":true};
  </script>
  <?php wp_footer(); ?>
  </body>
</html>
