jQuery(document).ready(function($) {

    gsap.registerPlugin(ScrollTrigger);

    const sec1_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#hero",
            start: "top", 
            end: "bottom",
            scrub: true,
        }
    });

    sec1_a.from(".banner-img", {yPercent: 0, duration: 0})
    sec1_a.to(".banner-img", {yPercent: 15, duration: 100})
    sec1_a.from(".content-box", {yPercent: 0, duration: 0})
    sec1_a.to(".content-box", {yPercent: 15, duration: 100})

    const sec2_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#message",
            start: "top", 
            end: "center",
            scrub: true,
            // markers: true,
        }
    });

    sec2_a.from(".message-dashes", {xPercent: 0, duration: 0})
    sec2_a.to(".message-dashes", {xPercent: 15, duration: 100})

    const sec3_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#bio-section",
            start: "center", 
            end: "bottom",
            scrub: true,
            // markers: true,
        }
    });
    
    sec3_a.from("#bio-section img", {yPercent: 0, duration: 0})
    sec3_a.to("#bio-section img", {yPercent: 10, duration: 100})

});