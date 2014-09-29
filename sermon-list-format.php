            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2 class="entry-header"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'sermon-manager' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                <div class="entry-content">
                    <?php render_wpfc_sermon_excerpt(); ?>
                </div><!-- .entry-content -->

                <div class="entry-meta">
                    <?php edit_post_link( __( 'Edit', 'sermon-manager' ), '<span class="edit-link">', '</span>' ); ?>
                </div><!-- .entry-utility -->
            </div><!-- #post-## -->
