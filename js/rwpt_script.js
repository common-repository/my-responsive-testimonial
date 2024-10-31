jQuery(function(e) {
	new WOW().init();
    function t() {
		
        e(".rwpt_testimonials .rwpt_photos ul li.active").removeClass("active");
        e(".rwpt_testimonials .rwpt_author p.active").removeClass("active");
        var n = e(".rwpt_clearfix li").length;
        randomclass = Math.floor(Math.random() * parseInt(n) + 1);
        e(".rwpt_testimonials .rwpt_quotes ul li.active").fadeOut("slow", function() {
            e(this).removeClass("active");
            e(".rwpt_testimonials .rwpt_quotes ul li.quote_" + randomclass).fadeIn().addClass("active");
        });
		e(".rwpt_testimonials .rwpt_author p.quote_" + randomclass).addClass("active");
        e(".rwpt_testimonials .rwpt_photos ul li.quote_" + randomclass).addClass("active");
        timeout = window.setTimeout(t, 5e3)
    }
    e.localScroll({
        duration: 750
    });

    e(".rwpt_testimonials .rwpt_photos ul li:first-child").addClass("active");
    e(".rwpt_testimonials .rwpt_photos ul li:nth-child(1)").addClass("quote_1");
    e(".rwpt_testimonials .rwpt_photos ul li:nth-child(2)").addClass("quote_2");
    e(".rwpt_testimonials .rwpt_photos ul li:nth-child(3)").addClass("quote_3");
    e(".rwpt_testimonials .rwpt_photos ul li:nth-child(4)").addClass("quote_4");
    e(".rwpt_testimonials .rwpt_photos ul li:nth-child(5)").addClass("quote_5");
    e(".rwpt_testimonials .rwpt_photos ul li:nth-child(6)").addClass("quote_6");
    e(".rwpt_testimonials .rwpt_photos ul li:nth-child(7)").addClass("quote_7");
    e(".rwpt_testimonials .rwpt_photos ul li:nth-child(8)").addClass("quote_8");
    e(".rwpt_testimonials .rwpt_photos ul li:nth-child(9)").addClass("quote_9");
    e(".rwpt_testimonials .rwpt_photos ul li:nth-child(10)").addClass("quote_10");
	
    e(".rwpt_testimonials .rwpt_quotes ul li:first-child").addClass("active");
    e(".rwpt_testimonials .rwpt_quotes ul li:nth-child(1)").addClass("quote_1");
    e(".rwpt_testimonials .rwpt_quotes ul li:nth-child(2)").addClass("quote_2");
    e(".rwpt_testimonials .rwpt_quotes ul li:nth-child(3)").addClass("quote_3");
    e(".rwpt_testimonials .rwpt_quotes ul li:nth-child(4)").addClass("quote_4");
    e(".rwpt_testimonials .rwpt_quotes ul li:nth-child(5)").addClass("quote_5");
    e(".rwpt_testimonials .rwpt_quotes ul li:nth-child(6)").addClass("quote_6");
    e(".rwpt_testimonials .rwpt_quotes ul li:nth-child(7)").addClass("quote_7");
    e(".rwpt_testimonials .rwpt_quotes ul li:nth-child(8)").addClass("quote_8");
    e(".rwpt_testimonials .rwpt_quotes ul li:nth-child(9)").addClass("quote_9");
    e(".rwpt_testimonials .rwpt_quotes ul li:nth-child(10)").addClass("quote_10");
	
    e(".rwpt_testimonials .rwpt_author p:first-child").addClass("active");
    e(".rwpt_testimonials .rwpt_author p:nth-child(1)").addClass("quote_1");
    e(".rwpt_testimonials .rwpt_author p:nth-child(2)").addClass("quote_2");
    e(".rwpt_testimonials .rwpt_author p:nth-child(3)").addClass("quote_3");
    e(".rwpt_testimonials .rwpt_author p:nth-child(4)").addClass("quote_4");
    e(".rwpt_testimonials .rwpt_author p:nth-child(5)").addClass("quote_5");
    e(".rwpt_testimonials .rwpt_author p:nth-child(6)").addClass("quote_6");
    e(".rwpt_testimonials .rwpt_author p:nth-child(7)").addClass("quote_7");
    e(".rwpt_testimonials .rwpt_author p:nth-child(8)").addClass("quote_8");
    e(".rwpt_testimonials .rwpt_author p:nth-child(9)").addClass("quote_9");
    e(".rwpt_testimonials .rwpt_author p:nth-child(10)").addClass("quote_10");
	
	
    t();
    e(".rwpt_testimonials .rwpt_photos ul li a").click(function() {
        return false
    });
    e(".rwpt_testimonials .rwpt_photos ul li").hover(function() {
        window.clearTimeout(timeout);
        e(".rwpt_testimonials .rwpt_photos ul li.active").removeClass("active");
        e(".rwpt_testimonials .rwpt_author p.active").removeClass("active");
        quoteclass = e(this).attr("class");
        e(".rwpt_testimonials .rwpt_quotes ul li.active").fadeOut("slow", function() {
            e(this).removeClass("active");
            e(".rwpt_testimonials .rwpt_quotes ul li." + quoteclass).fadeIn().addClass("active");
        });
		e(".rwpt_testimonials .rwpt_author p." + quoteclass).addClass("active");
        e(this).addClass("active");
    }, function() {
        timeout = window.setTimeout(t, 5e3);
        return false
    })
})