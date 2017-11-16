<?php
/**
 * Helper functions for the theme
 *
 * @package Abtheme
 */

/**
 * Get theme option based on its id.
 *
 * @param  string $opt_id Required. the option id.
 * @param  mixed $default Optional. Default if the option is not found or not yet saved.
 *                         If not set, false will be used
 * @return mixed
 */
function abtheme_get_opt($opt_id, $default = false)
{
    $opt_name = abtheme_get_opt_name();

    if (empty($opt_name)) {
        return $default;
    }

    global ${$opt_name};

    if (!isset(${$opt_name}) || !isset(${$opt_name}[$opt_id])) {
        return $default;
    }

    return ${$opt_name}[$opt_id];
}

/**
 * Get theme option based on its id.
 *
 * @param  string $opt_id Required. the option id.
 * @param  mixed $default Optional. Default if the option is not found or not yet saved.
 *                         If not set, false will be used
 * @return mixed
 */
function abtheme_get_page_opt($opt_id, $default = false)
{
    $page_opt_name = abtheme_get_page_opt_name();
    if (empty($page_opt_name)) {
        return $default;
    }
    global $post;
    return $options = !empty($post->ID) ? get_post_meta($post->ID, $opt_id, true) : $default;
}


/**
 * Get opt_name for Redux Framework options instance args and for
 * getting option value.
 *
 * @return string
 */
function abtheme_get_opt_name()
{
    return apply_filters('abtheme_opt_name', 'abtheme_theme_options');
}

/**
 * Get opt_name for Redux Framework options instance args and for
 * getting option value.
 *
 * @return string
 */
function abtheme_get_page_opt_name()
{
    return apply_filters('abtheme_page_opt_name', 'abtheme_page_options');
}

/**
 * Get opt_name for Redux Framework options instance args and for
 * getting option value.
 *
 * @return string
 */
function abtheme_get_post_opt_name()
{
    return apply_filters('abtheme_post_opt_name', 'abtheme_post_options');
}

/**
 * Get page title and description.
 *
 * @return array Contains 'title' and 'desc'
 */
function abtheme_get_page_titles()
{
    $title = $desc = '';

    // Default titles
    if (!is_archive()) {
        // Posts page view
        if (is_home()) {
            // Only available if posts page is set.
            if (!is_front_page() && $page_for_posts = get_option('page_for_posts')) {
                $title = get_the_title($page_for_posts);
                $desc = get_post_meta($page_for_posts, '_page_desc', true);
            }
        } // Single page view
        elseif (is_page()) {
            $title = get_post_meta(get_the_ID(), '_custom_title', true);
            if (!$title) {
                $title = get_the_title();
            }
            $desc = get_post_meta(get_the_ID(), '_custom_desc', true);
        } // 404
        elseif (is_404()) {
            $title = esc_html__('404', 'abtheme');
        } // Search result
        elseif (is_search()) {
            $title = esc_html__('Search results', 'abtheme');
            $desc = sprintf(esc_html__('You searched for: "%s"', 'abtheme'), get_search_query());
        } // Anything else
        else {
            $title = get_the_title();
        }
    } else {
        $title = get_the_archive_title();
        $desc = get_the_archive_description();
        // Category
        // if ( is_category() )
        // {
        //     $title = single_cat_title( '', false );
        //     $desc  = category_description();
        // }
        // // Tag
        // elseif ( is_tag() )
        // {
        //     $title = single_tag_title( '', false );
        //     $desc  = tag_description();
        // }
        // // Anything else
        // else
        // {
        //     $title    = get_the_archive_title();
        //     $subtitle = get_the_archive_description();
        // }
    }

    return array(
        'title' => $title,
        'desc'  => $desc
    );
}

/**
 * Generates an excerpt from the post content with custom length.
 * Default length is 55 words, same as default the_excerpt()
 *
 * The excerpt words amount will be 55 words and if the amount is greater than
 * that, then the string '&hellip;' will be appended to the excerpt. If the string
 * is less than 55 words, then the content will be returned as it is.
 *
 * @param int $length Optional. Custom excerpt length, default to 55.
 * @param int|WP_Post $post Optional. You will need to provide post id or post object if used outside loops.
 * @return string           The excerpt with custom length.
 */
function abtheme_get_the_excerpt($length = 55, $post = null)
{
    $post = get_post($post);

    if (empty($post) || 0 >= $length) {
        return '';
    }

    if (post_password_required($post)) {
        return esc_html__('Post password required.', 'shopy');
    }

    $content = apply_filters('the_content', strip_shortcodes($post->post_content));
    $content = str_replace(']]>', ']]&gt;', $content);

    $excerpt_more = apply_filters('shopy_excerpt_more', '&hellip;');
    $excerpt = wp_trim_words($content, $length, $excerpt_more);

    return $excerpt;
}


/**
 * Check if provided color string is valid color.
 * Only supports 'transparent', HEX, RGB, RGBA.
 *
 * @param  string $color
 * @return boolean
 */
function abtheme_is_valid_color($color)
{
    $color = preg_replace("/\s+/m", '', $color);

    if ($color === 'transparent') {
        return true;
    }

    if ('' == $color) return false;

    // Hex format
    if (preg_match("/(?:^#[a-fA-F0-9]{6}$)|(?:^#[a-fA-F0-9]{3}$)/", $color)) return true;

    // rgb or rgba format
    if (preg_match("/(?:^rgba\(\d+\,\d+\,\d+\,(?:\d*(?:\.\d+)?)\)$)|(?:^rgb\(\d+\,\d+\,\d+\)$)/", $color)) {
        preg_match_all("/\d+\.*\d*/", $color, $matches);
        if (empty($matches) || empty($matches[0])) return false;

        $red = empty($matches[0][0]) ? $matches[0][0] : 0;
        $green = empty($matches[0][1]) ? $matches[0][1] : 0;
        $blue = empty($matches[0][2]) ? $matches[0][2] : 0;
        $alpha = empty($matches[0][3]) ? $matches[0][3] : 1;

        if ($red < 0 || $red > 255 || $green < 0 || $green > 255 || $blue < 0 || $blue > 255 || $alpha < 0 || $alpha > 1.0) return false;
    } else {
        return false;
    }

    return true;
}

/**
 * Minify css
 *
 * @param  string $css
 * @return string
 */
function abtheme_css_minifier($css)
{
    // Normalize whitespace
    $css = preg_replace('/\s+/', ' ', $css);
    // Remove spaces before and after comment
    $css = preg_replace('/(\s+)(\/\*(.*?)\*\/)(\s+)/', '$2', $css);
    // Remove comment blocks, everything between /* and */, unless
    // preserved with /*! ... */ or /** ... */
    $css = preg_replace('~/\*(?![\!|\*])(.*?)\*/~', '', $css);
    // Remove ; before }
    $css = preg_replace('/;(?=\s*})/', '', $css);
    // Remove space after , : ; { } */ >
    $css = preg_replace('/(,|:|;|\{|}|\*\/|>) /', '$1', $css);
    // Remove space before , ; { } ( ) >
    $css = preg_replace('/ (,|;|\{|}|\(|\)|>)/', '$1', $css);
    // Strips leading 0 on decimal values (converts 0.5px into .5px)
    $css = preg_replace('/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css);
    // Strips units if value is 0 (converts 0px to 0)
    $css = preg_replace('/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css);
    // Converts all zeros value into short-hand
    $css = preg_replace('/0 0 0 0/', '0', $css);
    // Shortern 6-character hex color codes to 3-character where possible
    $css = preg_replace('/#([a-f0-9])\\1([a-f0-9])\\2([a-f0-9])\\3/i', '#\1\2\3', $css);
    return trim($css);
}