<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Thirteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

            <?php
            $sermon_settings = get_option('wpfc_options');
            $archive_title = $sermon_settings['archive_title'];
            if(empty($archive_title)):
                $archive_title = 'Sermons';
            endif;
            ?>

            <header class="entry-header">
                <h1 class="entry-title"><?php echo $archive_title; ?></h1>
            </header><!-- .entry-header -->

            <?php render_wpfc_sorting(); ?>
            <?php twentythirteen_paging_nav(); ?>

            <?php /* If there are no posts to display, such as an empty archive page */ ?>
            <?php if ( ! have_posts() ) : ?>
                <div id="post-0" class="post error404 not-found">
                    <h1 class="entry-title"><?php _e( 'Not Found', 'sermon-manager' ); ?></h1>
                    <div class="entry-content">
                        <p><?php _e( 'Apologies, but no sermons were found.', 'sermon-manager' ); ?></p>
                        <?php get_search_form(); ?>
                    </div><!-- .entry-content -->
                </div><!-- #post-0 -->
            <?php endif; ?>

            <?php /* Start the Loop. */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php include('sermon-list-format.php'); ?>
            <?php endwhile; // End the loop. ?>

            <?php twentythirteen_paging_nav(); ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>