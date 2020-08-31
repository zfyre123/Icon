jQuery(document).ready(function($) {

    gsap.registerPlugin(ScrollTrigger);

    // sub section one - home page

    const sec1_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#connect-top",
            start: "-300px", 
            end: "bottom",
            scrub: true,
            //markers: true
        }
    });

    const sec_hero = gsap.timeline({
        scrollTrigger: {
            trigger: "#hero",
            start: "-200px", 
            end: "bottom",
            scrub: true,
            //markers: true
        }
    });

    sec1_a.from("#connect-top h1", {yPercent: 0, duration: 1})
    sec1_a.to("#connect-top h1", {yPercent: -40, duration: 100})

    sec_hero.from("#hero .banner-img", {yPercent: 0, duration: 1})
    sec_hero.to("#hero .banner-img", {yPercent: -45, duration: 100})

    const sec1_b = gsap.timeline({
        scrollTrigger: {
            trigger: "#cta",
            start: "-400px", 
            end: "bottom",
            scrub: true,
            // markers: true
        }
    });

    sec1_b.from("#cta .btn", {yPercent: 10, duration: 1})
    sec1_b.to("#cta .btn", {yPercent: -100, duration: 80})


    // sec1_a.from(".banner-img", {yPercent: 0, duration: 1})
    // sec1_a.to(".banner-img", {yPercent: -55, duration: 1})

    const sec1_c = gsap.timeline({
        scrollTrigger: {
            trigger: "#icon-map",
            start: "-200px", 
            end: "bottom",
            scrub: true,
            //markers: true
        }
    });

    sec1_c.from("#icon-map .content-box", {yPercent: 10, duration: 5})
    sec1_c.to("#icon-map .content-box", {yPercent: -50, duration: 5})

    // // sub section two - home page

    const sec2_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#events",
            start: "top", 
            end: "center",
            scrub: true,
            // markers: true
        }
    });

    const sec2_b = gsap.timeline({
        scrollTrigger: {
            trigger: "#events",
            start: "center", 
            end: "bottom",
            scrub: true,
            // markers: true
        }
    });

    sec2_a.from("#events h2", {yPercent: 0, duration: 0})
    sec2_a.to("#events h2", {yPercent: -55, duration: 100})

    sec2_a.from(".people-gallery", {yPercent: 0, duration: 0})
    sec2_a.to(".people-gallery", {yPercent: -50, duration: 100})

    sec2_a.from(".people-gallery img", {right: 0, duration: 0})
    sec2_a.to(".people-gallery img", {right: -400, duration: 100})

    sec2_b.from("#events .btn", {yPercent: 10, duration: 0})
    sec2_b.to("#events .btn", {yPercent: -75, duration: 80})



    const sec3_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#bio-section",
            start: "top", 
            end: "center",
            scrub: true,
            // markers: true
        }
    });

    // sec3_a.from(".bio-img", {yPercent: 5, duration: 0})
    // sec3_a.to(".bio-img", {yPercent: -30, duration: 200})
    // sec3_a.from(".bio-img img", {yPercent: 5, duration: 0})
    // sec3_a.to(".bio-img img", {yPercent: -60, duration: 200})
    sec3_a.from("#bio-section img", {yPercent: 0, duration: 0})
    sec3_a.to("#bio-section img", {yPercent: 10, duration: 100})

    // const sec2_c = gsap.timeline({
    //     scrollTrigger: {
    //         trigger: "#every-sunday",
    //         start: "center", 
    //         end: "bottom",
    //         scrub: true,
    //         markers: true
    //     }
    // });

    // sec2_c.from(".sunday-content", {yPercent: 0, duration: 0})
    // sec2_c.to(".sunday-content", {yPercent: -10, duration: 100})

});