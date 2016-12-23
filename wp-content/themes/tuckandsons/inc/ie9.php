<?php if (!isset($_COOKIE['visited'])): ?>
        <div class="lightbox-target">
   
                <a id="lightbox-close" href="#">Close <span>X</span></a>
                
        </div>
        <div class="lightbox-content">
                
                
                <h2>Use Google Chrome for Best Experience</h2>
                <p class="narrate">You are using an old version of Internet Explorer. Our site is developed with the latest technology, which is not supported by older browsers<br>
    We recommend that you use <a target="_blank" href="http://google.com/chrome">Google Chrome</a> for accessing our (or any) website. It is a FREE and modern web-browser which supports the latest web technologies offering you a cleaner and more secure browsing experience.</p>

                <div class="prepend-1 span-4 append-11 last">
                    <a target="_blank" href="http://google.com/chrome"><img src="<?php echo get_template_directory_uri(); ?>/img/chrome.png" alt="Use Chrome" height="128px" width="128px"></a>
                </div>
        </div>

        <?php endif;?>