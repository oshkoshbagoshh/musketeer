<?php
/*
Template Name: Terms and Conditions
*/

get_header();
?>

<main id="primary" class="site-main">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>

        <div class="entry-content">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
            else :
            ?>
                <h2>Terms and Conditions</h2>
                <p>Last updated: <?php echo date('F d, Y'); ?></p>

                <!-- Insert your Terms and Conditions content here -->
                <?php echo wp_kses_post($terms_and_conditions_content); ?>

            <?php
            endif;
            ?>
        </div>
    </article>
</main>

<?php
get_footer();
