<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package _s
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
 <div id="index_search">
  <!--
  ===========================================================
  Search Locations
  ===========================================================
  -->
  <div class="wrapper">
    <div class="loc_search">
      <h2>Find Storage Now!</h2>
      <ul id="locationNav">
        <li>
          <a href="http://metrostorage.com/locations" class="top-level">Go</a>
        </li>
      </ul>
    </div>
  <!--
  ===========================================================
  Search By Zip
  ===========================================================
  -->
    <p class="divider">Or</p>

    <div class="zip_search">
      <h2>Search by Zip or City &amp; State</h2>
      <form accept-charset="UTF-8" action="//www.metrostorage.com/search_by_zip" method="get">
        <div style="margin:0;padding:0;display:inline">
          <input name="utf8" type="hidden" value="&#x2713;" />
        </div>
        <ul>
          <li class="input">
            <input id="zip" name="zip" placeholder='60654' size="11" type="text" value="" />
          </li>
          <li>
            <input class="go-button" name="commit" type="submit" value="Search" />
          </li>
        </ul>
      </form>
    </div>
    <a href="http://metrostorage.com/locations" class="all_stores">View All Stores and Features</a>
  </div>
</div>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

  <div id="employee">
    <img src="//www.metrostorage.com/images/pledge.jpg" alt="Total Customer Satisfaction Pledge">
    <p class="pledge_text">We are committed to providing you the best<br>storage experience in the industry</p>
  </div>
</div><!-- #secondary -->
