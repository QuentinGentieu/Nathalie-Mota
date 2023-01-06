// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btnP = document.getElementsByClassName("myBtnP")[0];


// Get the <span> element that closes the modal
var span = document.getElementById("close");

// When the user clicks on the button, open the modal
btnP.onclick = function() {
    modal.style.display = "block";
    console.log("Salut");
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

/*############################################################
####################### PREVIEW IMAGE BLOCK ##################
##############################################################
*/

var leftArrow = document.getElementById('left-arrow');
var rightArrow = document.getElementById('right-arrow');

var imgBefore = document.getElementsByClassName("img-before")[0];
var imgAfter = document.getElementsByClassName("img-after")[0];

leftArrow.addEventListener('mouseover', function(){

    imgAfter.classList.remove('display_block');
	imgBefore.classList.add('display_block');

});

leftArrow.addEventListener('mouseout', function(){

    imgAfter.classList.remove('display_block');
	imgBefore.classList.remove('display_block');

});

rightArrow.addEventListener('mouseover', function(){

    imgBefore.classList.remove('display_block');
	imgAfter.classList.add('display_block');

});

rightArrow.addEventListener('mouseout', function(){

    imgBefore.classList.remove('display_block');
	imgAfter.classList.remove('display_block');

});

/*############################################################
####################### HOVER LOGO IMAGE ON SINGLE.PHP #######
##############################################################
*/

/*---------------------------------------------First image on the single.php page on the second part-------------------------------------------------------------*/

var hoverImgFirst = document.getElementById('second-show-image');
var fullFirst = document.getElementById('fullscreen-big-image');



hoverImgFirst.addEventListener('mouseover', function(){

	fullFirst.classList.add('display_block_important');


});

hoverImgFirst.addEventListener('mouseout', function(){

    fullFirst.classList.remove('display_block_important');

});

/*---------------------------------------------First image on the single.php page on the third part-------------------------------------------------------------*/

var hoverImg = document.getElementById('mini-block-container');
var titlePic = document.getElementById('title-pic');
var cat = document.getElementById('cat');
var eye = document.getElementById('eye');
var full = document.getElementById('fullscreen');



hoverImg.addEventListener('mouseover', function(){

	titlePic.classList.add('display_block_important');
    cat.classList.add('display_block_important');
	eye.classList.add('display_block_important');
	full.classList.add('display_block_important');


});

hoverImg.addEventListener('mouseout', function(){

	titlePic.classList.remove('display_block_important');
    cat.classList.remove('display_block_important');
    eye.classList.remove('display_block_important');
    full.classList.remove('display_block_important');

});

/*---------------------------------------------Second image on the single.php page on the third part-------------------------------------------------------------*/

var hoverImg2 = document.getElementById('mini-block-container-2');
var titlePic2 = document.getElementById('title-pic-2');
var cat2 = document.getElementById('cat-2');
var eye2 = document.getElementById('eye-2');
var full2 = document.getElementById('fullscreen-2');



hoverImg2.addEventListener('mouseover', function(){

	titlePic2.classList.add('display_block_important');
    cat2.classList.add('display_block_important');
	eye2.classList.add('display_block_important');
	full2.classList.add('display_block_important');


});

hoverImg2.addEventListener('mouseout', function(){

	titlePic2.classList.remove('display_block_important');
    cat2.classList.remove('display_block_important');
    eye2.classList.remove('display_block_important');
    full2.classList.remove('display_block_important');

});

/*############################################################
####################### DETECTION ANIMATION ##################
##############################################################
*/

// Obtenir tous les éléments à animer
var elements = document.querySelectorAll('.container, .first-box-container, .second-box-container, .third-box-container, .styling-small-header, .second-fourth-box-container, .button-all-gallery , #footer-menu');

// Définir une fonction pour vérifier si l'élément est visible
function checkIfVisible() {
  // Obtenir la position actuelle du défilement
  var scrollPosition = window.scrollY;

  // Parcourir chaque élément
  elements.forEach(function(element) {
    // Obtenir la position de l'élément sur la page
    var elementPosition = element.getBoundingClientRect().top;

    // Obtenir la hauteur de la fenêtre
    var windowHeight = window.innerHeight;

    // Vérifier si l'élément est visible
    if (scrollPosition > elementPosition - windowHeight) {
      // Si l'élément est visible, déclencher l'animation
      element.classList.add('fadeAnimation');
    }
  });
}

// Déclencher la fonction au chargement de la page
window.addEventListener('load', checkIfVisible);

// Déclencher la fonction au défilement de la page
window.addEventListener('scroll', checkIfVisible);