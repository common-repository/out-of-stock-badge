jQuery(document).ready(function(){

});

function arrowD_changeExampleDisplayTxt(event){
	var txtBox_ele = event.target;
	var txtValue = txtBox_ele.value;
	var arrowD_exampleBadgeDiv = document.getElementById('arrowD_exampleBadgeDiv');
	arrowD_exampleBadgeDiv.innerText = txtValue;
}
function arrowD_changeExampleDisplayClr(event){
    var txtBox_ele = event.target;
    var txtValue = txtBox_ele.value;
    var arrowD_exampleBadgeDiv = document.getElementById('arrowD_exampleBadgeDiv');
    arrowD_exampleBadgeDiv.style.backgroundColor = txtValue;
}