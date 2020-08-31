jQuery(document).ready(function($) {

    gsap.registerPlugin(ScrollTrigger);


    const sec1_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#sermons-top",
            start: "top", 
            end: "center",
            scrub: true,
            //markers: true
        }
    });

    const sec1_b = gsap.timeline({
        scrollTrigger: {
            trigger: "#sermons-top",
            start: "center", 
            end: "bottom",
            scrub: true,
            //markers: true
        }
    });

    sec1_a.to(".top-img-overlay", {left: 0, top: 0, duration: 150})
    sec1_a.to("#sermons-top h1", {yPercent: -15, duration: 70})
    sec1_a.to(".top-img", {yPercent: -25, duration: 90})

    sec1_b.to(".top-content", {yPercent: -40, duration: 320})
    sec1_b.from("#sermons-top .lines", {left: -500, duration: 200})
    sec1_b.to("#sermons-top .lines", {left: 0, duration: 300})

    const sec2_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#cta",
            start: "-200px", 
            end: "bottom",
            scrub: true,
            //markers: true
        }
    });

    sec1_b.from("#cta .content-box", {yPercent: 15, duration: 80})
    sec2_a.to("#cta .content-box", {yPercent: -40, duration: 80})


    const sec3_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#current-sermon",
            start: "top", 
            end: "center",
            scrub: true,
            //markers: true
        }
    });

    const sec3_b = gsap.timeline({
        scrollTrigger: {
            trigger: ".sermon-top",
            start: "-200px", 
            end: "center",
            scrub: true,
            //markers: true
        }
    });

    sec3_a.to(".sermon-top", {yPercent: -45, duration: 50})
    sec3_b.to(".sermon-btm", {yPercent: -50, duration: 80})


    const sec4_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#sermon-series",
            start: "+200px", 
            end: "center",
            scrub: true,
            //markers: true
        }
    });

    sec4_a.to("#sermon-series .container", {yPercent: -35, duration: 100})


    const sec5_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#sermon-series",
            start: "center, -200px", 
            end: "bottom",
            scrub: true,
            //markers: true
        }
    });

    sec5_a.from(".grn-logo", {yPercent: 30, duration: 200})
    sec5_a.to(".grn-logo", {yPercent: 0, rotate: 720, duration: 150})

    const sec6_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#leadership-podcast",
            start: "top", 
            end: "center",
            scrub: true,
            // markers: true
        }
    });

//     const sec6_b = gsap.timeline({
//         scrollTrigger: {
//             trigger: ".leadership-podcast-row-1",
//             start: "top", 
//             end: "bottom",
//             scrub: true,
//             markers: true
//         }
//     });

    sec6_a.from(".leadership-podcast-row-1", {yPercent: 5, duration: 70})
    sec6_a.to(".leadership-podcast-row-1", {yPercent: -30, duration: 200})

    sec6_a.from(".leadership-podcast-row-2", {yPercent: 12, duration: 90})
    sec6_a.to(".leadership-podcast-row-2", {yPercent: -40, duration: 150})


    const sec7_a = gsap.timeline({
        scrollTrigger: {
            trigger: "#podcast-seasons",
            start: "top", 
            end: "bottom",
            scrub: true,
            // markers: true
        }
    });

    sec7_a.to("#bottom-section img", {top: 40, duration: 150})
	sec7_a.to("#podcast-seasons .container", {yPercent: -20, duration: 70})
    




});