<table> 
    <tr valign="top">
        <th class="metabox_label_column">
            <label for="meta_a">Text</label>
        </th>
        <td>
            <input type="text" id="meta_a" name="meta_a" value="<?php echo @get_post_meta($post->ID, 'meta_a', true); ?>" />
        </td>
    </tr>
    <tr valign="top">
        <th class="metabox_label_column">
            <label for="meta_b">Multiselect</label>
        </th>
        <td>

            <select multiple="multiple" id="meta_b" name="meta_b[]" >
                <?php
                $array_value = array( 1, 2, 3);
                $meta_value = @get_post_meta($post->ID, 'meta_b', true);

                foreach( $array_value as $value_option){
                    $my = '';
                    foreach ( $meta_value as $selected){
                        if ( $selected == $value_option) {
                            $my = "selected='selected'";
                        }
                    }
                    echo "<option value='$value_option' $my > Option $value_option </option>";
                } ?>

            </select>
             </td>
    </tr>

</table>
