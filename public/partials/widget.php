<div id="xxx">

	<div class="google-average">
        <div class="google-rating clearfix">
            <div class="google-rating-average">
                <h3>Google Rating</h3>
                <span><?php echo number_format($data['star_avg'],1); ?> </span>
                <div class="rating-container clearfix">
                    <div class="star-ratings-sprite star-ratings-sprite-small">
                        <span style="width:<?php echo (number_format($data['star_avg'],1) * 20); ?>%" class="star-ratings-sprite-rating"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<br/>

    <div class="testimonials clearfix">
        
        <?php foreach ($data['entries'] as $index => $entry) { ?>
        
        <div class="testimonial">
            <div class="testimonial-details clearfix">
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
