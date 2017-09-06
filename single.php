<?php
/**
 * Created by PhpStorm.
 * User: Julien COEURVOLAN
 * Date: 01/09/2017
 * Time: 15:30
 */
get_header();
$date = new Datetime( the_date( 'Y-m-d' ) );
?>
<main class="blog-article">
    <section class="jc_container">
        <div class="content bg-light ">
            <div class="padding">
                <div class="quarter-desktop float-left margin">
                    <p>le
                        <time datetime="<?php echo $date->format( 'Y-m-d' ); ?>"><?php echo $date->format( 'd F Y' ); ?> </time>
                    </p>
					<?php the_post_thumbnail( 'full' ); ?>
                </div>
                <h1 class="upperline dark"><?php the_title() ?></h1>
                <div class="padding clearfix">
					<?php
					while ( have_posts() ) : the_post(); ?>
                        <div class="entry-content-page">
							<?php
							the_content();
							?>
                        </div>

						<?php
					endwhile;
					wp_reset_query();
					?>
                </div>
                <div>
					<?php
					if ( have_rows( 'exemples' ) ):
						$countRow = 0;
						while ( have_rows( 'exemples' ) ) : the_row();
							?>
                            <div>
                                <div class="text-center">
                                    <button type="button" onclick="showSample('.example<?php echo $countRow; ?>')"
                                            class="btn margin btn-primary">Voir l'exemple <?php the_sub_field('titre');?>
                                    </button>

                                </div>
                                <div class="code<?php echo $countRow; ?> box wrap code-example">
                                    <div class="tier-desktop full">
                                        <h4>Html</h4>
                                        <pre><code class="html" contentEditable="true"><?php echo esc_html( get_sub_field( 'html' ) ); ?></code></pre>
                                    </div>
                                    <div class="tier-desktop full">
                                        <h4>Css</h4>
                                        <pre><code class="css" contentEditable="true"><?php echo esc_html( get_sub_field( 'css' ) ); ?></code></pre>
                                    </div>
                                    <div class="tier-desktop full">
                                        <h4>Javascript</h4>
                                        <pre><code class="javascript" contentEditable="true"><?php echo esc_html( get_sub_field( 'js' ) ); ?></code></pre>
                                    </div>
                                </div>
                            </div>
							<?php
							$countRow ++;
						endwhile;

					endif;

					?>
                </div>
            </div>
        </div>
    </section>
	<?php
	if ( have_rows( 'exemples' ) ):
		$countRow = 0;
		while ( have_rows( 'exemples' ) ) : the_row();
			?>
            <div class="examples padding example<?php echo $countRow; ?>">
                <span class="btn-close" title="Fermer">X</span>
                <style type="text/css">
                    <?php
                    echo get_sub_field( 'css' );
                     ?>
                </style>
                <div class="sample">
					<?php
					echo get_sub_field( 'html' );
					?>
                </div>
                <script type="text/javascript">
					<?php
					echo get_sub_field( 'js' );
					?>
                </script>
            </div>
			<?php
			$countRow ++;
		endwhile;

	endif;

	?>
</main>
<?php get_footer(); ?>
<script>
    hljs.initHighlightingOnLoad();
    var showSample;
    (function () {
        "use strict";
        const $ = jQuery;
        const $examples = $('.examples');
        $('.examples .btn-close').click(function () {
            $examples.fadeOut('fast');
        })
        $examples.fadeOut('fast');
        showSample = function (className) {
            $examples.fadeOut('fast');
            $(className).fadeIn('slow');
        }
    })();

</script>

