<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.linkedin.com/in/schiriacrobert/
 * @since      1.0.0
 *
 * @package    Reviews_Gravity_Forms_Addon
 * @subpackage Reviews_Gravity_Forms_Addon/public/partials
 */

?>

<div class="testimonials-list">

    <div class="rating-system">
        <h2 class="rating-title">Average Rating / <?php echo $data['total']; ?> Total Testimonials</h2>
        <div class="rating-container clearfix">
            <h2 class="rating-average"><?php echo number_format($data['star_avg'],1); ?>
                <span class="rating-average-maximum">Out of 5 stars</span>
            </h2>
            <div class="star-ratings-sprite">
                <span style="width:<?php echo (number_format($data['star_avg'],1) * 20); ?>%" class="star-ratings-sprite-rating"></span>
            </div>
        </div>
        <!-- /Rating container -->

        <div class="feedback">
        <form method="GET" action="<?php echo $atts['feedback']; ?>">
        <p class="company-name">PeachTrees Intl.</p>
            <button type="submit" class="leave-feedback" >Leave us feedback</button>
        </div>
        </form>
    </div>

    <div class="testimonials">

        <?php foreach ($data['entries'] as $index => $entry) { ?> 

            <div class="testimonial">
                <div class="star-ratings-sprite star-ratings-sprite-small">
                    <span style="width:<?php echo ($entry['stars'] * 20); ?>%" class="star-ratings-sprite-rating"></span>
                </div>
                <span class="rating-value"><?php echo $entry['stars']; ?> out of 5 stars</span>

                <div class="clearfix">
                    <a href="#" class="testimonial-author">
                        <?php
                            echo ucfirst($entry['first_name']) . ' ' . ucfirst($entry['last_name']);
                        ?>
                    </a>
                    <span class="separator"> - </span>
                    <a href="#" class="testimonial-date">
                        <?php
                            echo $entry['date'];
                        ?>
                    </a>
                </div>

                <div class="testimonial-container">
                    <?php
                        echo $entry['message'];
                    ?>
                </div>
            </div>

        <?php } ?>


    </div>
</div>
</br>
<?php
    if($atts['nav'] == 'true' && (intval($data['total']) > intval($atts['per_page']))) {
        $pages = (intval($data['total']) / intval($atts['per_page']));
    ?>

    <nav role="navigation">
        <ol class="pagination" aria-labelledby="pagination-label">
        <?php 
            for( $i=0; $i<$pages; $i++ ) {
                $selected = (isset($_REQUEST['r_page']) ?  (isset($_REQUEST['r_page']) && intval($_REQUEST['r_page']) == $i) : $i == 0 );
                echo '<li ' . ($selected ? ' class="selected"' : '')  . '><a href="' . ($selected ? '#' : get_permalink() . '?r_page=' . $i) . '"><span class="visually-hidden">page</span> ' . ($i + 1) . '</a></li>';
            }
        ?>
        </ol>
    </nav>
    <?php } ?>