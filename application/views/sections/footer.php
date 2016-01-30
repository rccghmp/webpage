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
    <div class="title">Get In Touch</div>
    <div id="footer" class="container">
        <header class="style1">
            <p>
                Subscribe to our newsletter and get prayer points, life changing declarations, powerful life tips and career progression counsels.
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
                                <h3 class="icon fa-home">Church Address</h3>
                                <p>
                                    4, Kofoworola Crescent,<br>
                                    Off Oyadiran Estate,<br>
                                    Sabo, Yaba Lagos.
                                </p>
                            </section>
                        </div>
                        <div class="6u 12u(mobile) my-cubes">
                            <section>
                                <h3 class="icon fa-comment">Social</h3>
                                <p>
                                    <a href="https://twitter.com/RCCGHMP">@RCCGHMP</a><br />
                                    <a href="https://www.facebook.com/RCCG-His-Majestys-Place-Zone-10-1494224137492858/?ref=ts&fref=ts" target="_blank">facebook.com/RCCG His Majesty Place</a>
                                </p>
                            </section>
                        </div>
                    </div>
                    <div class="row">
                        <div class="6u 12u(mobile) my-cubes">
                            <section>
                                <h3 class="icon fa-envelope">Email</h3>
                                <p>
                                    <a href="mailto:hismajestyplace@gmail.com">hismajestyplace@gmail.com</a>
                                    <a href="mailto:enquiry@rccghmp.org">enquiry@rccghmp.org</a>
                                </p>
                            </section>
                        </div>
                        <div class="6u 12u(mobile) my-cubes">
                            <section>
                                <h3 class="icon fa-phone">Phone</h3>
                                <p>
                                   (+234) 0705majesty
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
            <li>
                &copy; <?php echo $current_year; ?><br>
                Design by: <a href="mailto:rccghmp1@gmail.com">RCCG HMP Tech Team.</a>
            </li>
        </ul>
    </div>
</div>

</div>

<div id="go-top">
    <a class="smoothscroll" title="Back to Top" href="#topmost">
        <i class="fa fa-chevron-up"></i>
    </a></div>
<!-- Scripts -->

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/jquery.dropotron.min.js"></script>
<script src="../assets/js/skel.min.js"></script>
<script src="../assets/js/skel-viewport.min.js"></script>
<script src="../assets/js/util.js"></script>
<!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
<script src="../assets/js/main.js"></script>
<script src="../assets/js/background.cycle.js"></script>

</body>
</html>