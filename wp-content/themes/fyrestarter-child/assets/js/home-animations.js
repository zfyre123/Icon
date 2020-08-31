jQuery(document).ready(function($) {

    gsap.registerPlugin(ScrollTrigger);

    // sub section one - home page

    const sec1_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#home",
            start: "top", 
            end: "bottom",
            scrub: true,
            // markers: true
        }
    });

    sec1_a.from(".hero-box", {yPercent: 20, duration: 1})
    sec1_a.to(".hero-box", {yPercent: -80, duration: 100})

    const sec1_b = gsap.timeline({
        scrollTrigger: {
            trigger: "#home",
            start: "center", 
            end: "bottom",
            scrub: true,
            // markers: true
        }
    });

    sec1_b.from(".hero-txt", {yPercent: -5, duration: 1})
    sec1_b.to(".hero-txt", {yPercent: 5, duration: 1})

    const sec1_c = gsap.timeline({
        scrollTrigger: {
            trigger: "#home",
            start: "center", 
            end: "bottom",
            scrub: true,
            // markers: true
        }
    });

    sec1_c.from(".dots-home", {right: 0, duration: 5})
    sec1_c.to(".dots-home", {right: -400, duration: 5})

    const sec2_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#every-sunday",
            start: "top", 
            end: "bottom",
            scrub: true,
            // markers: true
        }
    });

    sec2_a.from(".church", {xPercent: 0, yPercent: 0,duration: 0})
    sec2_a.to(".church", {xPercent: 0, yPercent: 20, duration: 200})


    const sec2_b = gsap.timeline({
        scrollTrigger: {
            trigger: "#every-sunday",
            start: "top", 
            end: "center",
            scrub: true,
            // markers: true
        }
    });

    sec2_b.from(".dashes", {xPercent: 0, yPercent: 0, duration: 0})
    sec2_b.to(".dashes", {xPercent: 15, yPercent: 35, duration: 200})

    const sec2_c = gsap.timeline({
        scrollTrigger: {
            trigger: "#every-sunday",
            start: "center", 
            end: "bottom",
            scrub: true,
            // markers: true
        }
    });

    sec2_c.from(".sunday-content", {yPercent: 0, duration: 0})
    sec2_c.to(".sunday-content", {yPercent: -10, duration: 100})

    const sec3_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#banner",
            start: "-200px", 
            end: "bottom",
            scrub: true,
            // markers: true
        }
    });
    
    //sec3_a.from("#banner .banner-logo", {yPercent: 0, duration: 0})
    sec3_a.to("#banner .banner-logo", {rotate: 360, yPercent: -50, xPercent: -50, duration: 100})


    const sec4_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#sermons-podcasts",
            start: "top", 
            end: "center",
            scrub: true,
            // markers: true
        }
    });
    
    sec4_a.from("#sermons-podcasts .row.section-header", {yPercent: -20, duration: 100})
    sec4_a.to("#sermons-podcasts .row.section-header", {yPercent: 20, duration: 100})

    const sec5_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#people",
            start: "top", 
            end: "center",
            scrub: true,
            // markers: true
        }
    });

    const sec5_b = gsap.timeline({
        scrollTrigger: {
            trigger: "#people",
            start: "center", 
            end: "bottom",
            scrub: true,
            // markers: true
        }
    });

    const sec5_c = gsap.timeline({
        scrollTrigger: {
            trigger: "#people",
            start: "top", 
            end: "bottom",
            scrub: true,
            // markers: true
        }
    });

    sec5_a.from(".people-header", {yPercent: 0, duration: 0})
    sec5_a.to(".people-header", {yPercent: 40, duration: 100})

});