<?php
/**
 * Social Links Template
 */

$social_links = get_field('social_links', 'option');

if ($social_links) : ?>
    <div class="social-links">
        <?php foreach ($social_links as $link) : ?>
            <a href="<?php echo esc_url($link['url']); ?>" 
               class="social-link social-<?php echo esc_attr($link['platform']); ?>"
               target="_blank" 
               rel="noopener noreferrer"
               aria-label="<?php echo esc_attr(ucfirst($link['platform'])); ?>">
                
                <?php if ($link['icon']) : ?>
                    <img src="<?php echo esc_url($link['icon']['url']); ?>" 
                         alt="<?php echo esc_attr($link['icon']['alt']); ?>" 
                         class="social-icon">
                <?php else : ?>
                    <span class="social-icon-default"><?php echo esc_html($link['platform']); ?></span>
                <?php endif; ?>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
