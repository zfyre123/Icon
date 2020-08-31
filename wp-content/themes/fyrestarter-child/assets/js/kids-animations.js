jQuery(document).ready(function($) {

    gsap.registerPlugin(ScrollTrigger);

    const sec1_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#kids-top",
            start: "top", 
            end: "bottom",
            scrub: true,
            //markers: true
        }
    });

    const sec1_b = gsap.timeline({
        scrollTrigger: {
            trigger: "#hero",
            start: "-200px", 
            end: "bottom",
            scrub: true,
            //markers: true
        }
    });

    sec1_a.from("#kids-top .row", {yPercent: 5, duration: 1})
    sec1_a.to("#kids-top .row", {yPercent: -45, duration: 100})

    sec1_b.from("#hero .banner-img", {yPercent: 0, duration: 1})
    sec1_b.to("#hero .banner-img", {yPercent: 15, duration: 250})
    

    const sec2_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#page",
            start: "-300px", 
            end: "center",
            scrub: true,
            //markers: true
        }
    });

    const sec2_b = gsap.timeline({
        scrollTrigger: {
            trigger: "#hero .banner-img",
            start: "top", 
            end: "+900px",
            scrub: true,
            //markers: true
        }
    });

    //sec2_a.to("#page .container", {yPercent: 5, duration: 50})
    sec2_a.from(".kids-row", {yPercent: 70, duration: 100})
    sec2_a.to(".kids-row", {yPercent: 0, duration: 50})
    

});