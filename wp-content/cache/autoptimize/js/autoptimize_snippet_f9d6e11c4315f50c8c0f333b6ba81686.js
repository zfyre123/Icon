jQuery(document).ready(function($){gsap.registerPlugin(ScrollTrigger);const sec1_a=gsap.timeline({scrollTrigger:{trigger:"#hero",start:"+200px",end:"bottom",scrub:true,}});sec1_a.to("#hero .banner-img",{yPercent:-20,duration:100})
const sec2_a=gsap.timeline({scrollTrigger:{trigger:"#info",start:"top",end:"center",scrub:true,}});sec2_a.to("#info .mx-auto",{yPercent:-35,duration:150})
gsap.utils.toArray(".sermon-row").forEach(section=>{gsap.from(section.querySelectorAll(".sermon-row-info, .sermon-row-link"),{scrollTrigger:section,autoAlpha:0,y:25,duration:0.75,stagger:0.25});});gsap.utils.toArray(".resource-row, .info-row").forEach(section2=>{gsap.from(section2.querySelectorAll("h2, h3, p, .btn, li"),{scrollTrigger:section2,autoAlpha:0,y:25,duration:0.75,stagger:0.25});});gsap.utils.toArray(".sermon-podcast-content .row").forEach(section3=>{gsap.from(section3.querySelectorAll("div, p, h2, h3, .btns"),{scrollTrigger:section3,autoAlpha:0,y:25,duration:0.75,stagger:0.25});});gsap.utils.toArray("#info .row").forEach(section4=>{gsap.from(section4.querySelectorAll("div, p, a, h3, .btns"),{scrollTrigger:section4,autoAlpha:0,y:25,duration:0.75,stagger:0.25});});});