//This function will execute if any values are in localstorage. If they are, the HTML tag main will be 
//hidden and the PHP code will display an error message. 
function hideSecondPageTags() {

  //Getting the value of the localstorage variable
  let myVar = localStorage.getItem("Value");

  //if the local variable value is hide then the HTML Tag main will be hidden. 
  if (myVar == 'hide'){
    document.getElementById('results_main').style.display = 'none';
  }

}


window.onload = function() {
  hideSecondPageTags();
};