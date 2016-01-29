<?php
/**
 * Created by PhpStorm.
 * User: phemmy
 * Date: 15/12/15
 * Time: 10:53 PM
 */
?>
<?php
    $current_year = date('Y');
?>

<!-- Footer -->
<div id="footer-wrapper" class="wrapper">
    <div class="title">The Rest Of It</div>
    <div id="footer" class="container">
        <header class="style1">
            <h2>Ipsum sapien elementum portitor?</h2>
            <p>
                Sed turpis tortor, tincidunt sed ornare in metus porttitor mollis nunc in aliquet.<br />
                Nam pharetra laoreet imperdiet volutpat etiam consequat feugiat.
            </p>
        </header>
        <hr />
        <div class="row 150%">
            <div class="6u 12u(mobile)">

                <!-- Contact Form -->
                <section>
                    <form method="post" action="#">
                        <div class="row 50%">
                            <div class="6u 12u(mobile)">
                                <input type="text" name="name" id="contact-name" placeholder="Name" />
                            </div>
                            <div class="6u 12u(mobile)">
                                <input type="text" name="email" id="contact-email" placeholder="Email" />
                            </div>
                        </div>
                        <div class="row 50%">
                            <div class="12u">
                                <textarea name="message" id="contact-message" placeholder="Message" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="12u">
                                <ul class="actions">
                                    <li><input type="submit" class="style1" value="Send" /></li>
                                    <li><input type="reset" class="style2" value="Reset" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>

            </div>
            <div class="6u 12u(mobile)">

                <!-- Contact -->
                <section class="feature-list small">
                    <div class="row">
                        <div class="6u 12u(mobile) my-cubes">
                            <section>
                                <h3 class="icon fa-home">Mailing Address</h3>
                                <p>
                                    Untitled Corporation<br />
                                    1234 Somewhere Rd #987<br />
                                    Nashville, TN 00000-0000
                                </p>
                            </section>
                        </div>
                        <div class="6u 12u(mobile) my-cubes">
                            <section>
                                <h3 class="icon fa-comment">Social</h3>
                                <p>
                                    <a href="#">@untitled-corp</a><br />
                                    <a href="#">linkedin.com/untitled</a><br />
                                    <a href="#">facebook.com/untitled</a>
                                </p>
                            </section>
                        </div>
                    </div>
                    <div class="row">
                        <div class="6u 12u(mobile) my-cubes">
                            <section>
                                <h3 class="icon fa-envelope">Email</h3>
                                <p>
                                    <a href="#">info@untitled.tld</a>
                                </p>
                            </section>
                        </div>
                        <div class="6u 12u(mobile) my-cubes">
                            <section>
                                <h3 class="icon fa-phone">Phone</h3>
                                <p>
                                    (000) 555-0000
                                </p>
                            </section>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <div id="copyright">
        <ul>
            <li>&copy; <?php echo $current_year; ?></li><li>Design by: <a href="mailto:rccghmp1@gmail.com">RCCG HMP Tech Team.</a></li>
        </ul>
    </div>
</div>

</div>

<!-- Scripts -->

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/jquery.dropotron.min.js"></script>
<script src="../assets/js/skel.min.js"></script>
<script src="../assets/js/skel-viewport.min.js"></script>
<script src="../assets/js/util.js"></script>
<!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
<script src="../assets/js/main.js"></script>

</body>
</html>