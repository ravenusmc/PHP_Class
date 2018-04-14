//The purpose of this function is to check whether all of the form values are filled out. If they 
//are not then the values will be placed into local storage to be used on the results.php page to hide
//The table and information. To see how that code is executed, look at the second.js file.  


function hide_data() {

  //Getting the values on the form 
  let loanAmount = document.getElementById('loanAmount').value;
  let interestRate = document.getElementById('interestRate').value;
  let loanLength = document.getElementById('loanLength').value;


  //Checking to see if any of them are empty. If they are, enter a value into localStorage. 
  if (loanAmount === ""){
    localStorage.setItem("Value", "hide");
  } else if (interestRate === "") {
    localStorage.setItem("Value", "hide");
  }else if (loanLength === "") {
    localStorage.setItem("Value", "hide");
  }else {
    //If the form is all filled in than the local storage is set to not hide. 
    localStorage.setItem("Value", "noHide");
  }

} 


