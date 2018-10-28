//The code in this file will cover the home.php page 
'use strict';

function rotateColor(){

  let anchor_target = document.getElementById('comment_change');

  if (anchor_target.style.color == 'blue'){
    anchor_target.style.color = 'green';
  }else {
    anchor_target.style.color = 'blue';
  }

}

setInterval(rotateColor, 1000);
