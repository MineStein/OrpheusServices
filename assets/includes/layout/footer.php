        
        <div id="footer" class="section">
            <div class="container">
                <div id="footerTop">
                    <div class="left">
                        <a href="<?php isPanel(); ?>index"><img src="<?php isPanel(); ?>assets/images/branding/otherBlueLogo.png" alt="Opheus" drggable="false"><span>Orpheus Services</span></a>
                    </div>
                    <div class="right">
                        <ul>
                            <li><a href="http://www.mc-market.org/members/88055/" target="_blank" data-toggle="tooltip" data-placement="top" title="MC-Market"><i class="fa fa-cube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div id="footerBottom">
                    <div class="left">
                        <p>Copyright &copy; <?php echo date('Y'); ?> Orpheus Services &bull; <a href="<?php isPanel(); ?>tos">Terms of Service</a> &bull; <a href="<?php isPanel(); ?>tos">Privacy Policy</a></p>
                    </div>
                    <div class="right">
                        <p><a href="https://1amdev.com/" target="_blank">Website By&nbsp;<img src="<?php isPanel(); ?>assets/images/webdev/logo.png" alt="1amdev" width="65" draggable="false"></a></p>
                    </div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript" src="<?php isPanel(); ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php isPanel(); ?>assets/js/bootstrap.min.js"></script>
        <script>
            function scrollToElement(id) {
                $('main').animate({
                    scrollTop: $("#" + id).offset().top - 50
                }, 500);
            }

            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();

                var height = $(window).height() - 50;

                $("main").height(height);

                window.onresize = function(event) {
                    var height = $(window).height() - 50;

                    $("main").height(height);
                };
            });
        </script>

        </main>

    </body>
    
</html>