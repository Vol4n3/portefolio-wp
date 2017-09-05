<?php
/**
 * Created by PhpStorm.
 * User: Julien COEURVOLAN
 * Date: 01/09/2017
 * Time: 11:37
 * Template Name: blog
 */
get_header();
?>

    <main>
        <section class="blogs jc_container padding bg-light">

            <h1 class="upperline dark"><?php the_title(); ?></h1>
            <div>
				<?php
				while ( have_posts() ) : the_post(); ?>
                    <div class="entry-content-page">
						<?php the_content(); ?>
                    </div>

					<?php
				endwhile;
				wp_reset_query();
				?>
            </div>
            <div class="box wrap center y-center margin-y">
				<?php
				query_posts( array( 'post_type' => 'post' ) );
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					?>
                    <article class="tier-desktop half-tablet padding">

                        <figure class=" bg-light shadow padding">
                            <div class="figure-img box center y-center">
								<?php the_post_thumbnail(); ?>
                            </div>
                            <figcaption class="padding-y">
                                <div class="">
                                    <h3><?php the_title(); ?></h3>
									<?php the_field( 'description' ) ?>

                                    <p>test blabla</p>

                                </div>
                                <div class="text-right">
                                    <a class="btn btn-primary" href="<?php echo get_permalink(); ?>">Lire la suite</a>
                                </div>
                            </figcaption>
                        </figure>
                    </article>
					<?php
				endwhile;
				endif;
				?>

            </div>
        </section>
    </main>

<?php get_footer(); ?>