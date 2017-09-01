<?php
/**
 * Created by PhpStorm.
 * User: Julien COEURVOLAN
 * Date: 01/09/2017
 * Time: 15:30
 */
get_header();
$date = new Datetime(the_date('Y-m-d'));
?>
<main class="blog-article">
    <section class="jc_container">
        <div class="content bg-light padding">

            <div class="quarter float-left margin">
                <p>le
                    <time datetime="<?php echo $date->format('Y-m-d'); ?>"><?php echo $date->format('d F Y'); ?> </time>
                </p>
                <?php the_post_thumbnail('full'); ?>
            </div>
            <h1 class="upperline"><?php the_title() ?></h1>
            <div class="padding clearfix"><?php the_content(); ?>
                <div class="text-right">
                    <?php
                    if (have_rows('styles')): ?>
                        <p>Le style:</p>
                        <?php
                        while (have_rows('styles')) : the_row();
                            ?>
                            <a href="<? the_field('style_link') ?>"
                               title="<? the_field('style_name') ?>"><? the_field('script_name') ?></a>
                            <br>
                            <?php
                        endwhile;
                    endif;

                    ?>
                    <?php
                    if (have_rows('scripts')): ?>
                        <p>Le script:</p>
                        <?php
                        while (have_rows('scripts')) : the_row();
                            ?>
                            <a href="<? the_field('script_link') ?>"
                               title="<? the_field('script_name') ?>"><? the_field('script_name') ?></a>
                            <br>
                            <?php
                        endwhile;
                    endif;

                    ?>

                </div>
            </div>
        </div>
    </section>
        <?php
    if (have_rows('styles')):
        while (have_rows('styles')) : the_row();
            ?>
            <link type="text/css" rel="stylesheet" href="<? the_field('style_link') ?>">
            <?php
        endwhile;
    endif;

    ?>
    <div id="example" class="example">
    </div>
    <?php
    if (have_rows('scripts')):
        while (have_rows('scripts')) : the_row();
            ?>
            <script type="text/javascript" src="<? the_field('script_link') ?>"></script>

            <?php
        endwhile;
    endif;

    ?>
</main>
<?php get_footer(); ?>
