const hero = document.querySelector('.hero');
const slider = document.querySelector('.slider');
const logo = document.querySelector('#logo');
const hambuger = document.querySelector('.hambuger');
const headline = document.querySelector('.headline');

const tl = new TimelineMax();
tl.fromTo(hero, 1 , {height:"0%"} , {height:'80%' , ease:power2.easeInOut})
.fromTo(hero, 1.2 , {width:"100%"} , {width:'80%' , ease:power2.easeInOut})
.fromTO(slider, 1.2, {x:"-100%"}, {x:'0%', ease:power2.easeInOut}, "-=1.2")

.fromTo(logo, 0.5 ,{opacity:0, x:30 }, {opacity:1, x:0}, "-=0.5")
.fromTo(hambuger, 0.5 ,{opacity:0, x:30 }, {opacity:1, x:0}, "-=1");
