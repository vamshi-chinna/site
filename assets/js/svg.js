/* SVG Animation using vivus.js - https://maxwellito.github.io/vivus/ */

const animate = ["l1_svg","l2_svg","l3_svg","l4_svg","l5_svg"];
let animations = [];

animate.forEach(makeAnimations);
function makeAnimations(svgId, index, arr){
  arr[index] = new Vivus(svgId, {duration:300, type:'delayed', start: 'inViewport', animTimingFunction: Vivus.EASE});
  animations[index] = arr[index];
}
