jQuery(document).ready(function(i){i(document).foundation(),i(".services-slider").slick({dots:!0,arrows:!1,autoplay:!0,responsive:[{breakpoint:480,settings:{autoplay:!1}}]}),i(".pb-gallery-wrapper").slick({prevArrow:'<button type="button" class="slick-arrow slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',nextArrow:'<button type="button" class="slick-arrow slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',adaptiveHeight:!0,dots:!1}),i(".pb-gallery-thumbnails .thumbnail").on("click",function(e){var t=i(this),s=t.index();t.closest(".pb-gallery").find(".slick-slider").slick("slickGoTo",s)}),i(".accordion p:empty, .orbit p:empty").remove(),i(".archive-grid .columns").last().addClass("end"),i('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function(){i(this).innerWidth()/i(this).innerHeight()>1.5?i(this).wrap("<div class='widescreen flex-video'/>"):i(this).wrap("<div class='flex-video'/>")})});
//# sourceMappingURL=scripts.js.map
