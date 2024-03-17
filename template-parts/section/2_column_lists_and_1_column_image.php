<div class="row two-column-list">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
    	<div class="listing-div-flex">
            <?php
			if (have_rows("first_column_list")) {
			?>
            <div class="lt-line">
                <ul>
                <?php
                while (have_rows("first_column_list")) : the_row();
                	echo "<li>".get_sub_field("list")."</li>";
                endwhile;
                ?>
                </ul>
            </div>
            <?php
        	}
        	if (have_rows("second_column_list")) {
			?>
            <div class="lt-line">
                <ul>
                <?php
                while (have_rows("second_column_list")) : the_row();
                	echo "<li>".get_sub_field("list")."</li>";
                endwhile;
                ?>
                </ul>
            </div>
            <?php
        	}
        	if(!empty(get_sub_field("third_column_image"))){
        	?>
        	<div class="lt-img-logo">
                <img src="<?php echo get_sub_field("third_column_image"); ?>" alt="image" class="img-fluid">
            </div>
        	<?php
        	}
            ?>
        </div>
    </div>
</div>