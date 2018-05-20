
//Tab Javascript Work
function fun1(){
$('#tab1 a').addClass('selected');
$('#tab2 a').removeClass('selected');
$('#tab3 a').removeClass('selected');
$('#tab4 a').removeClass('selected');
$('#tab5 a').removeClass('selected');

document.getElementById('div1').style.display='block';
document.getElementById('div2').style.display='none';
document.getElementById('div3').style.display='none';
document.getElementById('div4').style.display='none';
document.getElementById('div5').style.display='none';
}
function fun2(){
$('#tab1 a').removeClass('selected');
$('#tab2 a').addClass('selected');
$('#tab3 a').removeClass('selected');
$('#tab4 a').removeClass('selected');
$('#tab5 a').removeClass('selected');

document.getElementById('div1').style.display='none';
document.getElementById('div2').style.display='block';
document.getElementById('div3').style.display='none';
document.getElementById('div4').style.display='none';
document.getElementById('div5').style.display='none';
}
function fun3(){
$('#tab1 a').removeClass('selected');
$('#tab2 a').removeClass('selected');
$('#tab3 a').addClass('selected');
$('#tab4 a').removeClass('selected');
$('#tab5 a').removeClass('selected');

document.getElementById('div1').style.display='none';
document.getElementById('div2').style.display='none';
document.getElementById('div3').style.display='block';
document.getElementById('div4').style.display='none';
document.getElementById('div5').style.display='none';
}
function fun4(){
$('#tab1 a').removeClass('selected');
$('#tab2 a').removeClass('selected');
$('#tab3 a').removeClass('selected');
$('#tab4 a').addClass('selected');
$('#tab5 a').removeClass('selected');

document.getElementById('div1').style.display='none';
document.getElementById('div2').style.display='none';
document.getElementById('div3').style.display='none';
document.getElementById('div4').style.display='block';
document.getElementById('div5').style.display='none';
}
function fun5(){
$('#tab1 a').removeClass('selected');
$('#tab2 a').removeClass('selected');
$('#tab3 a').removeClass('selected');
$('#tab4 a').removeClass('selected');
$('#tab5 a').addClass('selected');

document.getElementById('div1').style.display='none';
document.getElementById('div2').style.display='none';
document.getElementById('div3').style.display='none';
document.getElementById('div4').style.display='none';
document.getElementById('div5').style.display='block';
}
window.onload = function() {
	document.getElementById('tab1').onclick=fun1;
	document.getElementById('tab2').onclick=fun2;
	document.getElementById('tab3').onclick=fun3;
	document.getElementById('tab4').onclick=fun4;
	document.getElementById('tab5').onclick=fun5;
	
	document.getElementById('div1').style.display='block';
	document.getElementById('div2').style.display='none';
	document.getElementById('div3').style.display='none';
	document.getElementById('div4').style.display='none';
	document.getElementById('div5').style.display='none';
}
