// Function to display author picture using ACF field, here custom field is 'author_picture'
function display_author_picture() {
    // Get the current post's author ID
    $author_id = get_the_author_meta('ID');
    
    // Retrieve the custom field value (image URL)
    $author_picture = get_field('author_picture', 'user_' . $author_id);
    
    // Default image URL
    $default_image_url = 'https://example.com/wp-content/uploads/2024/12/default-pic.jpg';
    
    // Check if the author picture exists, else use the default image
    $image_url = $author_picture ? esc_url($author_picture['url']) : esc_url($default_image_url);
    $alt_text = $author_picture ? esc_attr($author_picture['alt']) : 'Default Author Picture';

    // Generate the HTML for the image with inline styles
    return '<div class="author-picture">
                <img src="' . $image_url . '" alt="' . $alt_text . '" 
                     style="width: 80px; height: 80px; border-radius: 100px; object-fit: cover;">
            </div>';
}

// Register shortcode for the function '[author_picture]'
add_shortcode('author_picture', 'display_author_picture');

/* this this php code to display the field to your single.php template '<?php echo do_shortcode('[author_picture]'); ?>'
