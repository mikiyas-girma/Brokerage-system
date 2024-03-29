<footer class="full-row bg-secondary p-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="divider py-40">
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                        </div>
                        <div class="col-md-12 col-lg-8">
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <div class="footer-widget footer-nav mb-4">
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="footer-widget footer-nav mb-4">
                                        <h4 class="widget-title text-white double-down-line-left position-relative">
                                            Quick Links</h4>
                                        <ul class="hover-text-primary">
                                            <li><a href="home.php" class="text-white">View Property</a></li>
                                            <li><a href="home.php" class="text-white">Post your property</a></li>
                                            <li><a href="#conditions" class="text-white">Terms and Condition</a></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="footer-widget">
                                        <h4 class="widget-title text-white double-down-line-left position-relative">
                                            Contact Us</h4>
                                        <ul class="text-white">
                                            <li class="hover-text-primary">
                                                <a href="tel:+251927279885" class="text-white">
                                                    <i class="fas fa-phone mr-2 font-13 mt-1"></i>+251 927279885
                                                </a>
                                            </li>
                                            <li class="hover-text-primary">
                                                <a href="tel:+251967584934" class="text-white">
                                                    <i class="fas fa-phone mr-2 font-13 mt-1"></i>+251 967584934
                                                </a>
                                            </li>
                                            <li class="hover-text-primary">
                                                <a href="mailto:mike12@gmail.com" class="text-white">
                                                    <i class="fas fa-envelope mr-2 font-13 mt-1"></i>mike12@gmail.com
                                                </a>
                                            </li>
                                            <li class="hover-text-primary">
                                                <a href="mailto:mike12@gmail.com" class="text-white">
                                                    <i class="fas fa-envelope mr-2 font-13 mt-1"></i>murte@gmail.com
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row copyright justify-content-center">
            © 2023 Jimma Ethiopia, All rights reserved
        </div>
    </div>

</footer>
<!--	Footer   start -->


<!-- Scroll to top -->
<a href="#" class="bg-primary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a>
<!-- End Scroll To top -->
</div>
</div>
<!-- Wrapper End -->
<script src="js/home/js/jquery.min.js"></script>
<!--jQuery Layer Slider -->
<script src="js/home/js/greensock.js"></script>
<script src="js/home/js/layerslider.transitions.js"></script>
<script src="js/home/js/layerslider.kreaturamedia.jquery.js"></script>
<!--jQuery Layer Slider -->
<script src="js/home/js/popper.min.js"></script>
<script src="js/home/js/bootstrap.min.js"></script>
<script src="js/home/js/owl.carousel.min.js"></script>
<script src="js/home/js/tmpl.js"></script>
<script src="js/home/js/jquery.dependClass-0.1.js"></script>
<script src="js/home/js/draggable-0.1.js"></script>
<script src="js/home/js/jquery.slider.js"></script>
<script src="js/home/js/wow.js"></script>
<script src="js/home/js/YouTubePopUp.jquery.js"></script>
<script src="js/home/js/validate.js"></script>
<script src="js/home/js/jquery.cookie.js"></script>
<script src="js/home/js/custom.js"></script>








<script>
    // Wait for the document to be ready
    document.addEventListener("DOMContentLoaded", function () {
        // Get the login and registration form elements
        var loginForm = document.getElementById("login-form");
        var registerForm = document.getElementById("register-form");
        var title = document.getElementById("title");
        var myalert = document.getElementById("myalert");




        // Get the sign-up link element
        var signupLink = document.getElementById("signup-link");
        // Get the login link element
        var loginLink = document.getElementById("login-link");

        // Add a click event listener to the sign-up link
        signupLink.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent the default link behavior

            // Toggle the visibility of the login and registration forms
            if (loginForm.style.display === "none") {
                loginForm.style.display = "block";
                registerForm.style.display = "none";
            } else {
                loginForm.style.display = "none";
                title.style.display = "block";
                registerForm.style.display = "block";
            }
        });

        loginLink.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent the default link behavior

            // Toggle the visibility of the login and registration forms
            if (loginForm.style.display === "none") {
                loginForm.style.display = "block";
                registerForm.style.display = "none";
                title.style.display = "block";

            } else {
                loginForm.style.display = "block";
                registerForm.style.display = "none";
            }
        });

        // show an myalert only for three seconds
        setTimeout(function () {
            myalert.style.display = "none";
        }, 3000);

    });


</script>

<!-- logic behind form validation  -->
<script src="includes/formvalidation.js"></script>
<script src="includes/formvalidation.test.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

</body>

</html>