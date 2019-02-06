window.onload = initForm;

function initForm() {
	document.getElementById("species").onchange = toggleToEnterNewSpecies;
	
}

function toggleToEnterNewSpecies() {
	
	var tag = document.getElementById("species");
    var selectedSpecies = tag.options[tag.selectedIndex].value;
    
    var tfSpecies= document.getElementById("txtSpecies");
      
    if(selectedSpecies ==="Others"){	
    
    	tfSpecies.removeAttribute("readonly");
    }	
    else{
    	tfSpecies.value ="";
    	tfSpecies.setAttribute("readonly", "readonly");
    }	
}







