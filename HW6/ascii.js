/*
Programmer:	Tara Walton
Folder: 	tara1984
Notes:  	HW5- ASCIImation - Due 12/2
			Practice with javascript event handlers
			**TURBO does not work**
URL: 
*/

"use strict";

var currentAnimation; 		// an array of ascii frames
var interval; 				// an interval object
var speed = 250; 			// delay in ms
var size; 					// initial set to medium by default in html

window.onload = pageLoad;
// event handlers for controls

function pageLoad() 
{
	document.getElementById("stop").disabled = true;
	document.getElementById("start").onclick = play;
	document.getElementById("stop").onclick = stop;
	document.getElementById("animation").onchange = changeAnimation;
	document.getElementById("size").onchange = changeSize;
	//document.getElementById("speed").onclick = currentSpeed;

}

// speed changes to 50, don't stop animation
/* function currentSpeed() 
{ 
	if (this.checked)
	{
		speed = 50;
		interval = function() {displayNextFrame(currentAnimation);}, speed);
	}
} */

// change the animation when a different one is selected
function changeAnimation() 
{
	var newAnimation = document.getElementById("animation").value;
	var textarea = document.getElementById("ascii");
	textarea.value = ANIMATIONS[newAnimation];
}

// process the animation and display it
function play() 
{
	document.getElementById("stop").disabled = false;		//enable while playing
	document.getElementById("start").disabled = true;		//disable when started
	document.getElementById("animation").disabled = true;
	var textarea = document.getElementById("ascii");
	var allFrames = textarea.value.split("=====\n");
	currentAnimation = allFrames;
	interval = setInterval(function() {displayNextFrame(currentAnimation);}, speed);
}

// display all when not playing
function stop() 
{
	document.getElementById("start").disabled = false;
	document.getElementById("animation").disabled = false;
	changeAnimation();
	clearInterval(interval);
	document.getElementById("stop").disabled = true;
}

// a helper function that displays the next frame
function displayNextFrame(animation) 
{
	var textarea = document.getElementById("ascii");
	var currentFrame = animation.shift();
	textarea.value = currentFrame;
	animation.push(currentFrame);
	currentAnimation = animation;
}

// change the font size of the output
function changeSize() 
{
	var size = document.getElementById("size").value;
	document.getElementById("ascii").style.fontSize = size;		//change to unobtrusive
}