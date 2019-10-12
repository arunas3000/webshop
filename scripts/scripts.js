/*Sort function*/

//Function for redirecting on selecting the sort option
	function redirect(goto){
    if (goto != '') {
        window.location = goto;
    }
}
	
	var selectEl = document.getElementById('sort');

selectEl.onchange = function(){
    var goto = this.value;
    redirect(goto);
    
};
