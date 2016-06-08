<?php 
	/**
	 *  Wrap every X Columns in a Row
	 */

    if(!empty($items_repeater)):
        $items_in_row = 3; // How many Columns to wrap in a Row
        $k = 0;
        $count_items = count($items_repeater);
?>
        <div class="outer_wrapper">
            <?php foreach ($items_repeater as $item):
                if($k%$items_in_row == 0 ){
                    echo '<div class="row">';
                }
            ?>
                <div class="column">
                    some text goes here some text goes here some text goes here some text goes here some text goes here
                    some text goes here some text goes here some text goes here some text goes here some text goes here
                </div>
            <?php
                if( ( ($k+1)%$items_in_row == 0 && $k!=0) || $k+1 == $count_items){
                  echo '</div>';
                }
                $k++; 
                endforeach; 
            ?>
        </div> <!-- end of outer wrapper -->
<?php endif; ?>