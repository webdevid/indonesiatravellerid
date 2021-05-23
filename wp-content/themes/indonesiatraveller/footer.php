<?php

$footer_description     = carbon_get_theme_option( 'footer_description' );
$footer_logo            = carbon_get_theme_option( 'footer_description' );
$footer_copyright       = carbon_get_theme_option( 'footer_copyright' );
$footer_text            = carbon_get_theme_option( 'footer_text' );
$wpe_box                = carbon_get_theme_option( 'wpe_box' );
$wpe_subscribe_action   = carbon_get_theme_option( 'wpe_subscribe_action' );


?>
    <div id="footer" class="footer">
        <div class="container">
            <div class="footer-copyright">
                <p class="float-end mb-1">
                    <?php echo $footer_text;?>
                </p>
                <p class="mb-1"><?php echo $footer_copyright; ?></p>
            </div>
        </div>
    </div>
</div>
    <div id="cookie-notice" class="w-100 bg-dark text-white pt-3 px-4 pb-1 position-fixed"
        style="z-index: 1000; bottom: 0;">
        <div class="container p-2">
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <p class="p-2">This website uses cookies so that we can provide you with the best website
                        experience. By clicking “I Accept” you acknowledge the use of cookies and to our <a
                            href="<?php echo site_url();?>/about/privacy-policy"><u>Privacy Policy</u></a> and <a
                            href="<?php echo site_url();?>/about/terms-of-use"><u>Terms of use</u></a>.</p>
                </div>
                <div class="col-sm-4 col-md-3">
                    <a class="i-accept btn btn-primary m-2">I Accept</a>
                </div>
            </div>
        </div>
    </div>
    <!--[if IE]><div class="w-100 text-center bg-dark text-white pt-3 px-4 pb-1 position-fixed" style="z-index: 1000; bottom: 0;"><p onClick="parentNode.remove()">Please use a modern browser for a better browsing experience. <span class="float-right">X</span></p></div><![endif]-->
<?php /*
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-hoverintent@1.10.1/jquery.hoverIntent.min.js"></script>
    */ ?>
    <script type="text/javascript">

    function wpeToggleShow(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
        /*
        (function ($) {
            // gdpr cookies
            $('.i-accept').on('click', function () {
                if (localStorage.noshow !== '1') {
                    $('#cookie-notice').addClass('d-none');
                    localStorage.noshow = '1';
                }
            });
            if (localStorage.noshow == '1') {
                $('#cookie-notice').addClass('d-none');
            };
            // mega menu


            $("#menu li").hoverIntent(megaOpen);

            function megaOpen(){
                var target = $(this);
                var megacontent = target.data('target');
                console.log(megacontent);
                if(target.hasClass('megamenu')){
                    if($(megacontent).hasClass('active')){
                        target.addClass('current');
                        $(megacontent).addClass('active');
                    }else{
                        $('#menu li').removeClass('current');
                        $('.megamenu-item' ).removeClass('active');
                        $(megacontent).addClass('active');
                    }
                }else{
                    $('#menu li').removeClass('current');
                    $( '.megamenu-item' ).removeClass('active');
                    target.addClass('current');
                }
            }

            $('.megamenu-item' ).mouseleave(function(){
                $('#menu li').removeClass('current');
                $(this).removeClass('active');
            });
            $(document).keyup(function(e) {
                if (e.key === "Escape") { // escape key maps to keycode `27`
                    $('#menu li').removeClass('current');
                    $('.megamenu-item' ).removeClass('active');
                }
            });

            // share page
            $('.share-page').click(function(e){
                e.preventDefault();
                $(this).hide();
                $('.share-page_link').show();
            });

            $('.share-page_link a.close').click(function(e){
                e.preventDefault();
                $('.share-page_link').hide();
                $('.share-page').show();
            });

            $('.search-menu').click(function(e){
                e.preventDefault();
                $('.search-box').slideToggle( "slow" );
            });

            $('.btn-menu-mobile').click(function(){
                $('.main-menu.cf').slideToggle(200);
            });
        })(jQuery);

        // external link target blank
        var links = document.links;
        for (var i = 0, linksLength = links.length; i < linksLength; i++) {
            if (links[i].hostname != window.location.hostname) {
                links[i].target = '_blank';
                links[i].rel = 'nofollow';
            }
        }
        */

    </script>


<?php wp_footer();?>
</body>
</html>