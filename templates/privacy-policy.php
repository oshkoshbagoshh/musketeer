<?php
/*
Template Name: Privacy Policy
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
            // Check if there's content in the WordPress editor
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
            else :
                // If no content is added in the WordPress editor, display default content
            ?>
                <h2>Privacy Policy</h2>
                <p>Last updated: September 07, 2024</p>

                <p>This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.</p>

                <!-- ... rest of the privacy policy content ... -->

                <h2>Contact Us</h2>
                <p>If you have any questions about this Privacy Policy, You can contact us:</p>
                <ul>
                    <li>By email: hello@tfnms.co</li>
                    <li>By phone number: 773 710 3016</li>
                </ul>
            <?php
            endif;
            ?>
        </div>
    </article>
</main>

<?php
get_footer();
