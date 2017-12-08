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
			</form>
		</div>
    </div>
</div>
	<br/>
<div id="xxx">
    <div class="testimonials clearfix">
        
        <?php foreach ($data['entries'] as $index => $entry) { ?>
        
        <div class="testimonial">
            <div class="testimonial-details clearfix">
                <div class="avatar-container">
                    <img src="download.jpg" alt="avatar" class="avatar">
                    </div>
                    <div class="details">
                    <a class="testimonial-author" href="#"><?php echo $entry['first_name'] . ' ' . $entry['last_name']; ?></a>
                    <p class="testimonial-date"><?php echo $entry['date']; ?></p>
                    </div>
                </div>
                <div>
                <div class="rating-container clearfix">
                    <div class="star-ratings-sprite star-ratings-sprite-small">
                        <span style="width:<?php echo (number_format($entry['stars'],1) * 20); ?>%" class="star-ratings-sprite-rating"></span>
                    </div>
                </div>
                <?php if($entry['message'] != '') { ?> 
                <p class="testimonial-text">
                    <?php echo $entry['message']; ?>
                </p>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
