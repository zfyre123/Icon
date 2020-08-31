jQuery(document).ready(function($) {

    gsap.registerPlugin(ScrollTrigger);

    const sec1_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#sundays-top",
            start: "top", 
            end: "bottom",
            scrub: true,
        }
    });

    sec1_a.from(".lake-txt", {yPercent: 0, duration: 0})
    sec1_a.to(".lake-txt", {yPercent: 20, duration: 100})

    const sec1_b = gsap.timeline({
        scrollTrigger: {
            trigger: "#hero",
            start: "top", 
            end: "bottom",
            scrub: true,
        }
    });

    const sec1_c = gsap.timeline({
        scrollTrigger: {
            trigger: "#hero",
            start: "center", 
            end: "bottom",
            scrub: true,
        }
    });

    sec1_b.from(".banner-img", {yPercent: 0, duration: 0})
    sec1_b.to(".banner-img", {yPercent: 20, duration: 100})
    sec1_c.from(".hero-shape", {xPercent: 0, yPercent: 0, duration: 0})
    sec1_c.to(".hero-shape", {xPercent: 5, yPercent: 30, duration: 100})
    
    const sec2_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#sundays",
            start: "top", 
            end: "center",
            scrub: true,
        }
    });

    const sec2_b = gsap.timeline({
        scrollTrigger: {
            trigger: "#sundays",
            start: "top", 
            end: "bottom",
            scrub: true,
        }
    });

    sec2_a.from(".middle-content", {xPercent: 0, duration: 0})
    sec2_a.to(".middle-content", {xPercent: 5, duration: 100})
    sec2_b.from(".icon", {yPercent: 0, duration: 0})
    sec2_b.to(".icon", {yPercent: -40, duration: 100})

    // const sec3_a = gsap.timeline({
    //     scrollTrigger: {
    //         trigger: "#where",
    //         start: "-200px", 
    //         end: "bottom",
    //         scrub: true,
    //     }
    // });
    
    // sec3_a.from(".location-img-top", {xPercent: 0, duration: 0})
    // sec3_a.to(".location-img-top", {xPercent: 10, duration: 100})
    // sec3_a.from(".location-row", {yPercent: 0, duration: 0})
    // sec3_a.to(".location-row", {yPercent: -50, duration: 100})

    const sec4_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#kids",
            start: "top", 
            end: "center",
            scrub: true,
        }
    });

    const sec4_b = gsap.timeline({
        scrollTrigger: {
            trigger: "#kids",
            start: "top", 
            end: "bottom",
            scrub: true,
        }
    });

    sec4_a.from(".kids-img-arrows", {xPercent: 0, duration: 0})
    sec4_a.to(".kids-img-arrows", {xPercent: 10, duration: 100})
    sec4_b.from(".content-box", {yPercent: 0, duration: 0})
    sec4_b.to(".content-box", {yPercent: 10, duration: 100})
    sec4_b.from("h2", {yPercent: 0, duration: 0})
    sec4_b.to("h2", {yPercent: 10, duration: 100})

});