<?php
/**
 * Video Block - Flexible Content Component
 *
 * @package WordPress Theme Starter Pack
 */

$video = get_sub_field('video');
$poster = get_sub_field('poster_image');
$caption = get_sub_field('caption');
?>

<section class="video-section">
    <div class="container">
        <div class="video-wrapper">
            <video controls <?php echo ($poster) ? 'poster="' . esc_url($poster['url']) . '"' : ''; ?>>
                <source src="<?php echo esc_url($video['url']); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            
            <?php if ($caption) : ?>
                <div class="video-caption">
                    <?php echo wp_kses_post($caption); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
