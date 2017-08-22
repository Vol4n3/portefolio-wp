<?php
/**
 * Created by PhpStorm.
 * User: vol4n3
 * Date: 19/08/2017
 * Time: 09:33
 */
get_header();
?>
<main>
    <section id="stars">
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
                        Depuis, je réalise diverses animations css/canvas/webgl et fait beaucoup d'intégration de
                        maquette
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
    </section>
    <section class="bottom-header box y-center center">
        <div class="title-caption box down y-center ">
            <h2 class="light margin-y">Code is my passion</h2>
            <p>Website work in progress</p>
            <div>
                <span class="btn margin-x btn-primary ">getCV('pdf');</span>
                <span class="btn margin-x text-uppercase">Hire me</span>
            </div>
        </div>
    </section>
    <section class="universe">
        <div class="light padding-y">
            <div class="text-center">
                <h3 class="upperline">
                    My universe
                </h3>
            </div>
            <div class="box wrap center margin-y">
                <figure class="margin">
                    <img src="https://www.w3.org/html/logo/downloads/HTML5_Logo_512.png">
                    <figcaption>
                        <p>Html 5</p>
                    </figcaption>
                </figure>
                <figure class="margin">
                    <img src="https://maxcdn.icons8.com/Share/icon/Logos//css31600.png">
                    <figcaption>
                        <p>Css 3</p>
                    </figcaption>
                </figure>
                <figure class="margin">
                    <img src="https://aspblogs.blob.core.windows.net/media/dwahlin/Windows-Live-Writer/57c59b2be72b_127DE/image_8.png">
                    <figcaption>
                        <p>Javascript</p>
                    </figcaption>
                </figure>
            </div>
        </div>
    </section>
    <section class="skills bg-light padding-y">
        <div class="jc_container">
            <h3 class="dark upperline">My Skills</h3>
            <div id="chart-skill">
                <div class="marking-level box down auto">
                    <div><i>Maitrise</i></div>
                    <div><i>Expert</i></div>
                    <div><i>Avancé</i></div>
                    <div><i>Junior</i></div>
                    <div><i></i></div>

                </div>
            </div>
        </div>
    </section>

</main>
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
            $('.bottom-header').css('background-position', '50%' + (-scrollTop / 2) + 'px');
        });

        function fixSize() {
            $('.fix-top-header').height($('.top-header').height());
        }

        fixSize();
        /*Resize event*/
        window.addEventListener('resize', () => {
            fixSize();
            if (scene) {
                scene.clear();
                initStars();
            }
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
                        this.velocity = new Vector(-7, -0.02);
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

        var scene = new Game('stars');

        function initStars() {
            for (let i = 0; i < scene.getWidth() / 10; i++) {
                scene.add('star' + i, new Star(Math.random() * scene.getWidth(), Math.random() * scene.getHeight()));
            }
        }

        initStars();

        class Chart {
            constructor(width, height, ...skillLevel) {
                this.points = []
                for (let i = 0; i < skillLevel.length; i++) {
                    var p = new Point(width * i / skillLevel.length, height);
                    p.speed = 4;
                    p.setTargetPosition(width * i / skillLevel.length,height - skillLevel[i]);
                    this.points.push(p);
                }
                this.points.push(new Point(width, height))
            }
            draw(ctx) {
                // move to the first point
                ctx.save();

                ctx.beginPath();
                ctx.fillStyle = "#f8f9fa"
                ctx.shadowBlur = 100;
                ctx.shadowColor = '#c0c0c0';
                ctx.moveTo(this.points[0].x, this.points[0].y);

                let i;
                for (i = 1; i < this.points.length - 2; i++) {
                    var xc = (this.points[i].x + this.points[i + 1].x) / 2;
                    var yc = (this.points[i].y + this.points[i + 1].y) / 2;
                    ctx.quadraticCurveTo(this.points[i].x, this.points[i].y, xc, yc);
                    this.points[i].moveToTarget();
                }
                // curve through the last two points
                ctx.quadraticCurveTo(this.points[i].x, this.points[i].y, this.points[i + 1].x, this.points[i + 1].y);
                this.points[i].moveToTarget();

                ctx.closePath();
                ctx.fill();
                ctx.restore();
            }
        }

        var sceneSkills = new Game('chart-skill');

        function initSkills() {

            sceneSkills.add('points',
                new Chart(
                    sceneSkills.canvas.width, sceneSkills.canvas.height, 0, 400, 0, 300, 0,650,0,500,0,650));
        }

        initSkills();
    })

</script>
