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
          <div class='content-row add-space-b hide-below-tablet-p'>
            <p class='highlight white-text-color center add-space-g'>
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
                  <a href='<?php echo site_url(); ?>/about-us/'>About Genome</a>
                </li>
                <li>
                  <a href='<?php echo site_url(); ?>/partners-and-allies/'>Partners & Allies</a>
                </li>
                <li>
                  <a href='<?php echo site_url(); ?>/media-kit/'>Media Kit</a>
                </li>
              </ul>
            </div>
            <div class='col'>
              <ul>
                <li>
                  <a href='<?php echo site_url(); ?>/privacy-kit/'>Privacy Kit</a>
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
    <!--   Replace below this line with: https://gist.github.com/bradfordbradford/4a6ca907b8e7f434e0f0  -->
    <script src='//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-509d72c21cd49086'></script>
    <script>
      var addthis_config = {"data_track_addressbar":true};
    </script>
    <script>
      var disqus_shortname = 'genometest'; // required: replace example with your forum shortname
      (function () {
      var s = document.createElement('script'); s.async = true;
      s.type = 'text/javascript';
      s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
      (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
      }());
    </script>
    <script>
      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
    <script>
      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
    <!--   End Replace.   -->
  <?php wp_footer(); ?>
  </body>
</html>
