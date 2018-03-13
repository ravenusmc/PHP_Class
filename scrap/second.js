//This function will execute if any values are in localstorage. If they are, the HTML tag main will be 
//hidden and the PHP code will display an error message. 
function hideSecondPageTags() {

  let myVar = localStorage.getItem("Value");

  if (myVar == 'hide'){
    document.getElementById('results_main').style.display = 'none';
  }

}


window.onload = function() {
  hideSecondPageTags();
};