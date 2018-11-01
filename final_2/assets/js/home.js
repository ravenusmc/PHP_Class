//The code in this file will cover the home.php page 
'use strict';

function rotateColor(){

  let anchor_target = document.getElementById('comment_change');

  if (anchor_target.style.color == 'rgb(20, 154, 242)'){
    anchor_target.style.color = 'rgb(235, 101, 13)';
  }else {
    anchor_target.style.color = 'rgb(20, 154, 242)';
  }

}

setInterval(rotateColor, 1000);

function rotateColor_2(){

  let anchor_target = document.getElementById('comment_change_2');

  if (anchor_target.style.color == 'rgb(20, 154, 242)'){
    anchor_target.style.color = 'rgb(235, 101, 13)';
  }else {
    anchor_target.style.color = 'rgb(20, 154, 242)';
  }

}

setInterval(rotateColor_2, 1000);
