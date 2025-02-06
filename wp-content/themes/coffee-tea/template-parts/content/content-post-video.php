<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Coffee Tea
 */

// For archive post setting
$coffee_tea_post_heading = get_theme_mod('coffee_tea_post_heading_settings', '1');
$coffee_tea_post_content = get_theme_mod('coffee_tea_post_content_settings', '1');
$coffee_tea_post_date = get_theme_mod('coffee_tea_post_date_settings', '1');
$coffee_tea_post_comments = get_theme_mod('coffee_tea_post_comments_settings', '1');
$coffee_tea_post_author = get_theme_mod('coffee_tea_post_author_settings', '1');
$coffee_tea_post_tags = get_theme_mod('coffee_tea_post_tags_settings', '1');

// For single post setting
$coffee_tea_single_post_heading = get_theme_mod('coffee_tea_single_post_heading_settings', '1');
$coffee_tea_single_post_content = get_theme_mod('coffee_tea_single_post_content_settings', '1');
$coffee_tea_single_post_date = get_theme_mod('coffee_tea_single_post_date_settings', '1');
$coffee_tea_single_post_comments = get_theme_mod('coffee_tea_single_post_comments_settings', '1');
$coffee_tea_single_post_author = get_theme_mod('coffee_tea_single_post_author_settings', '1');
$coffee_tea_single_post_tags = get_theme_mod('coffee_tea_single_post_tags_settings', '1');

$coffee_tea_is_archive_visible = (
    $coffee_tea_post_heading == '1' ||
    $coffee_tea_post_content == '1' ||
    $coffee_tea_post_date == '1' ||
    $coffee_tea_post_comments == '1' ||
    $coffee_tea_post_author == '1' ||
    $coffee_tea_post_tags == '1'
);

$coffee_tea_is_single_visible = (
    $coffee_tea_single_post_heading == '1' ||
    $coffee_tea_single_post_content == '1' ||
    $coffee_tea_single_post_date == '1' ||
    $coffee_tea_single_post_comments == '1' ||
    $coffee_tea_single_post_author == '1' ||
    $coffee_tea_single_post_tags == '1'
);

if (!is_single() && !$coffee_tea_is_archive_visible) {
    return;
}

if (is_single() && !$coffee_tea_is_single_visible) {
    return;
}

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>
	<?php
		$coffee_tea_post_id = get_the_ID();
		$coffee_tea_post = get_post($coffee_tea_post_id);
		$coffee_tea_content = do_shortcode(apply_filters('the_content', $coffee_tea_post->post_content));
		$coffee_tea_embeds = get_media_embedded_in_content($coffee_tea_content);

		if (!empty($coffee_tea_embeds)) {
			foreach ($coffee_tea_embeds as $coffee_tea_embed) {
				$coffee_tea_embed = wp_kses($coffee_tea_embed, array(
					'iframe' => array(
						'src' => array(),
						'width' => array(),
						'height' => array(),
						'frameborder' => array(),
						'allowfullscreen' => array(),
					),
					'video' => array(
						'src' => array(),
						'width' => array(),
						'height' => array(),
						'controls' => array(),
					),
				));
				if (strpos($coffee_tea_embed, 'video') !== false || 
					strpos($coffee_tea_embed, 'youtube') !== false || 
					strpos($coffee_tea_embed, 'vimeo') !== false || 
					strpos($coffee_tea_embed, 'dailymotion') !== false || 
					strpos($coffee_tea_embed, 'vine') !== false || 
					strpos($coffee_tea_embed, 'wordpress.tv') !== false || 
					strpos($coffee_tea_embed, 'hulu') !== false) {
					?>
					<div class="custom-embedded-video">
						<div class="video-container">
							<?php echo $coffee_tea_embed; ?>
						</div>
						<div class="video-comments">
							<?php comments_template(); ?>
						</div>
					</div>
					<?php
				}
			}
		}
	?>
	<?php
	if (is_single()) :
        if ($coffee_tea_single_post_date == '1') : ?>
            <h6 class="theme-button"><?php echo esc_html(get_the_date('j')); ?>, <?php echo esc_html(get_the_date('M')); ?> <?php echo esc_html(get_the_date('Y')); ?></h6>
        <?php endif;
    else :
        if ($coffee_tea_post_date == '1') : ?>
            <h6 class="theme-button"><?php echo esc_html(get_the_date('j')); ?>, <?php echo esc_html(get_the_date('M')); ?> <?php echo esc_html(get_the_date('Y')); ?></h6>
        <?php endif;
    endif;
    ?>

    <div class="blog-content">
        <?php
        if (is_single()) :
            if ($coffee_tea_single_post_heading == '1') :
                the_title('<h5 class="post-title">', '</h5>');
            endif;
        else :
            if ($coffee_tea_post_heading == '1') :
                the_title(sprintf('<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h5>');
            endif;
        endif;

        if (is_singular()) :
            if ($coffee_tea_single_post_content == '1') :
                the_content();
            endif;
        else :
            if ($coffee_tea_post_content == '1') :
                echo "<p>" . wp_trim_words(get_the_excerpt(), 50) . "</p>";
            endif;
        endif;
        ?>
    </div>

    <?php if (is_singular()) : ?>
        <ul class="comment-timing">
            <?php if ($coffee_tea_single_post_comments == '1') : ?>
                <li><a href="javascript:void(0);"><i class="fa fa-comment"></i> <?php echo esc_html(get_comments_number($post->ID)); ?></a></li>
            <?php endif; ?>

            <?php if ($coffee_tea_single_post_author == '1') : ?>
                <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fa fa-user"></i><?php esc_html_e('By', 'coffee-tea'); ?> <?php the_author(); ?></a></li>
            <?php endif; ?>
        </ul>
        <?php else : ?>
        <ul class="comment-timing">
            <?php if ($coffee_tea_post_comments == '1') : ?>
                <li><a href="javascript:void(0);"><i class="fa fa-comment"></i> <?php echo esc_html(get_comments_number($post->ID)); ?></a></li>
            <?php endif; ?>

            <?php if ($coffee_tea_post_author == '1') : ?>
                <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fa fa-user"></i><?php esc_html_e('By', 'coffee-tea'); ?> <?php the_author(); ?></a></li>
            <?php endif; ?>
        </ul>
    <?php endif; ?>

    <?php
    if (is_singular()) :
        if ($coffee_tea_single_post_tags == '1') : ?>
            <div class="blog-tags mt-3">
                <?php the_tags(); ?>
            </div>
        <?php endif;
        else :
        if ($coffee_tea_post_tags == '1') : ?>
            <div class="blog-tags mt-3">
                <?php the_tags(); ?>
            </div>
        <?php endif;
    endif;
    ?>
</div>