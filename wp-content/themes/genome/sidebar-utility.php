<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<?php

  $url = $_SERVER['REQUEST_URI'];
  $tokens = explode('/', $url);
  $url = $tokens[sizeof($tokens)-2];

?>

                <aside class='aside-column-primary'>
                  <div class='aside-block'>
                    <ul class='featured-list slats side-nav'>
                      <li<?php if ($url == 'about-us') { echo " class='active'"; } ?>>
                        <a href='<?php echo site_url(); ?>/about-us/'>About Us</a>
                      </li>
                      <li<?php if ($url == 'partners-and-allies') { echo " class='active'"; } ?>>
                        <a href='<?php echo site_url(); ?>/partners-and-allies/'>Partners & Allies</a>
                      </li>
                      <li<?php if ($url == 'contributors') { echo " class='active'"; } ?>>
                        <a href='<?php echo site_url(); ?>/contributors/'>Contributors</a>
                      </li>
                      <li<?php if ($url == 'media-kit') { echo " class='active'"; } ?>>
                        <a href='<?php echo site_url(); ?>/media-kit/'>Media Kit</a>
                      </li>
                      <li<?php if ($url == 'privacy-policy') { echo " class='active'"; } ?>>
                        <a href='<?php echo site_url(); ?>/privacy-policy/'>Privacy Policy</a>
                      </li>
                      <li<?php if ($url == 'contact') { echo " class='active'"; } ?>>
                        <a href='<?php echo site_url(); ?>/contact/'>Contact Us</a>
                      </li>
                    </ul>
                  </div>
                </aside>