jQuery(document).ready(function($) {

    gsap.registerPlugin(ScrollTrigger);

    const sec1_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#give-top",
            start: "top", 
            end: "bottom",
            scrub: true,
            // markers: true
        }
    });

    sec1_a.from(".navy-txt", {yPercent: 0, duration: 1})
    sec1_a.to(".navy-txt", {yPercent: 25, duration: 100})
    
    const sec1_b = gsap.timeline({
        scrollTrigger: {
            trigger: "#give",
            start: "-150px", 
            end: "bottom",
            scrub: true,
            // markers: true
        }
    });

    const sec1_c = gsap.timeline({
        scrollTrigger: {
            trigger: "#give",
            start: "-150px", 
            end: "center",
            scrub: true,
            // markers: true
        }
    });

    sec1_b.from(".give-content-section", {yPercent: 0, duration: 1})
    sec1_b.to(".give-content-section", {yPercent: 10, duration: 100})
    sec1_c.from(".arrows", {xPercent: 0, yPercent: 0, duration: 1})
    sec1_c.to(".arrows", {xPercent: -20, yPercent: 15, duration: 100})
    

});