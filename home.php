<?php
/**
 * Created by PhpStorm.
 * User: vol4n3
 * Date: 19/08/2017
 * Time: 09:33
 */
get_header();
?>
<div id="stars">
    <div class="jc_container padding-y">
        <div class="box between wrap relative y-center ">
            <div class="half light">
                <h3 class="upperline">Know more
                    <br>About me</h3>
                <p class="">
                    Grand passionné par la science et les arts, j'ai commencé par la profession d'opticien, cette
                    expérience
                    était pleinement intéressante.
                </p>
                <p>
                    Après 7 ans dans ce métier, j'ai découvert mon talent pour la programmation d'applications.
                    Coder des sites web est devenu ma passion.
                </p>
                <p>
                    J'ai acquis une maitrise des languages informatiques en très peu de temps.
                    Depuis, je réalise diverses animations css/canvas/webgl et fait beaucoup d'intégration de maquette
                    sous
                    different support.
                </p>
                <p>
                    Je réalise aussi des sites web que ça soit sur la partie front ou bien la partie back, car j'ai
                    beaucoup
                    de connaissances en dans diverses technologies et surtout celle qui tourne autour du Javascript
                    (ES6).
                </p>
            </div>
            <div class="image-about-me box y-center">
                <img src="https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/24161_337238796860_985757_n.jpg?oh=05e5ce0e73ab97dd36705add051d73a2&oe=5A23F81F">
            </div>
        </div>

    </div>
</div>
<div class="bottom-header box y-center center">
    <div class="title-caption box down y-center ">
        <h2 class="light margin-y">Code is my passion</h2>
        <p>Website work in progress</p>
        <div>
            <span class="btn margin-x btn-primary ">getCV('pdf');</span>
            <span class="btn margin-x text-uppercase">Hire me</span>
        </div>
    </div>
</div>

<?php
get_footer();
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jcvPhysics.js"></script>
<script type="text/javascript">
    jQuery(function () {
        const $ = jQuery;


        class HeaderTitle {
            constructor(element) {
                this.setActive($(document).scrollTop());
                this.element = element;
            }

            setActive(scrollTop) {
                this.active = scrollTop > 133 && !this.active
                    || scrollTop > 75 && this.active;
            }

            resize(scrollTop) {
                this.setActive(scrollTop);
                if (this.active) {
                    fixSize();
                    this.element.addClass('active');
                    setTimeout(fixSize, 810);
                } else {
                    fixSize();
                    this.element.removeClass('active');
                    setTimeout(fixSize, 810);
                }
            }
        }

        const ht = new HeaderTitle($('.big-title'));
        /*scroll event*/
        $(document).scroll(() => {
            let scrollTop = $(this).scrollTop();
            /*Header bar*/
            ht.resize(scrollTop);
            /*Header img effect*/
            $('.bottom-header').css('background-position', '50%' + (-scrollTop/3) + 'px');
        });

        function fixSize() {
            $('.fix-top-header').height($('.top-header').height());
        }

        fixSize();
        /*Resize event*/
        window.addEventListener('resize', () => {
            fixSize();
        });

        class Star extends Point {
            constructor(x, y) {
                super(x, y);

                this.velocity = this.getDefaultVelocity();
                this.intensity = Math.random() * 0.7;
                this.count = 0;

            }

            getDefaultVelocity() {
                return new Vector(Math.random() * 0.05 + 0.2, 0.05);
            }

            draw(ctx) {
                ctx.save();
                ctx.beginPath();
                ctx.arc(this.x, this.y, 5, 0, Math.PI * 2);
                this.intensity += (Math.random() * 5 - 2.5 ) / 30;
                this.intensity = (this.intensity < 0) ? 0 : this.intensity;
                this.intensity = (this.intensity > 0.7) ? 0.7 : this.intensity;
                if (this.x > ctx.canvas.width) {

                    if (Math.random() > 0.95) {
                        this.velocity = new Vector(-7, -0.02)
                    } else {
                        this.x = 0;
                    }
                }
                if (this.x < 0) {
                    this.y = 0;
                    this.velocity = this.getDefaultVelocity();

                }
                if (this.y > ctx.canvas.height) this.y = 0;
                if (this.y < 0) {
                    this.x = 0;
                    this.velocity = this.getDefaultVelocity();
                }
                var grd = ctx.createRadialGradient(this.x, this.y, 1, this.x, this.y, 3);
                grd.addColorStop(0, "rgba(255,255,255," + this.intensity);
                grd.addColorStop(1, "rgba(255,255,255,0)");
                ctx.fillStyle = grd;
                ctx.fill();
                ctx.restore();
                this.add(this.velocity);
            }
        }

        var game = new Game('stars');
        for (let i = 0; i < game.getWidth()/10; i++) {
            game.add('star' + i, new Star(Math.random() * game.getWidth(), Math.random() * game.getHeight()))

        }
    })

</script>
