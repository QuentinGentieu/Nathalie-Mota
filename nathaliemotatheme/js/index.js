/*############################################################
####################### HOVER HOME IMAGE ON INDEX.PHP ########
##############################################################
*/

/*---------------------------------------------Every images on the single.php page-------------------------------------------------------------*/

// Sélectionne tous les éléments de classe 'home-img'
var hoverImgHome = document.querySelectorAll('.home-img');

// Sélectionne tous les éléments de classe 'title-pic-home'
var titlePicHome = document.querySelectorAll('.title-pic-home');

// Sélectionne tous les éléments de classe 'cat-home'
var catHome = document.querySelectorAll('.cat-home');

// Sélectionne tous les éléments de classe 'eye-home'
var eyeHome = document.querySelectorAll('.eye-home');

// Sélectionne tous les éléments de classe 'fullscreen-home'
var fullHome = document.querySelectorAll('.fullscreen-home');

// Pour chaque élément sélectionné par 'hoverImgHome'
hoverImgHome.forEach(function(el) {
  // Ajoute un gestionnaire d'événement 'mouseover' à l'élément
  el.addEventListener('mouseover', function(event) {
    // Trouve l'index de l'élément sur lequel l'événement a eu lieu
    const index = Array.from(hoverImgHome).indexOf(event.currentTarget);

    // Ajoute la classe 'display_block_important' aux éléments correspondants
    titlePicHome[index].classList.add('display_block_important');
    catHome[index].classList.add('display_block_important');
    eyeHome[index].classList.add('display_block_important');
    fullHome[index].classList.add('display_block_important');
  });

  // Ajoute un gestionnaire d'événement 'mouseout' à l'élément
  el.addEventListener('mouseout', function(event) {
    // Trouve l'index de l'élément sur lequel l'événement a eu lieu
    const index = Array.from(hoverImgHome).indexOf(event.currentTarget);

    // Retire la classe 'display_block_important' aux éléments correspondants
    titlePicHome[index].classList.remove('display_block_important');
    catHome[index].classList.remove('display_block_important');
    eyeHome[index].classList.remove('display_block_important');
    fullHome[index].classList.remove('display_block_important');
  });
});

/*############################################################
####################### LOAD MORE BUTTON ON INDEX.PHP ########
##############################################################
*/
var buttonMore = document.getElementsByClassName('more-content')[0];

var contentMore = document.getElementsByClassName("more-content-description")[0];
var cameraMore = document.getElementsByClassName("camera")[0];

buttonMore.addEventListener('mouseover', function(){

  contentMore.classList.add('display_none');
	cameraMore.classList.add('display_block_important');

});

buttonMore.addEventListener('mouseout', function(){

  cameraMore.classList.remove('display_block_important');
	contentMore.classList.remove('display_none');

});

let deltaHeight = 1500;
let basicHeight = 4460;

const pageContentOne = document.getElementsByClassName('selectOne')[0];
const pageContentTwo = document.getElementsByClassName('selectTwo')[0];
const BtnContent = document.getElementById('button-content');
const BtnContentLotMore = document.getElementsByClassName('button-container-more')[0];


BtnContent.addEventListener('click', function() {
  let newHeight = pageContentOne.offsetHeight + deltaHeight;
  console.log("wow");
  if(newHeight <= 6000){
    pageContentOne.style.height = newHeight + 'px';
    BtnContentLotMore.classList.add('display-none-button');
    BtnContentLotMore.classList.add('display-none-button-all');
    pageContentOne.classList.add('display-height-button');
  }
});

BtnContent.addEventListener('click', function() {
  let newHeight = pageContentTwo.offsetHeight + deltaHeight;
  console.log("wow");
  if(newHeight <= 6000){
    pageContentTwo.style.height = newHeight + 'px';
    BtnContentLotMore.classList.add('display-none-button');
    BtnContentLotMore.classList.add('display-none-button-all');
    pageContentTwo.classList.add('display-height-button');
  }
});



/*############################################################
####################### FILTER SYSTEM ON INDEX.PHP ###########
##############################################################
*/

/*##########################################
################ CATEGORIES ################
############################################*/

var button = document.getElementById('buttonOneForJs');
var buttonValue = button.value;

var links = document.querySelectorAll('.dropdown-content-1 a');

for (var i = 0; i < links.length; i++) {
  links[i].addEventListener('click', function() {
    buttonValue = button.value;

    console.log(buttonValue);

    if (buttonValue == "All"){
		// récupère tous les éléments div ayant la classe mariage
		const elements = document.querySelectorAll('div.all-img');
    const btnLoad = document.getElementsByClassName('button-container-more')[0];
    const jsFilt = document.getElementsByClassName('js-filter')[0];

		// parcours chaque élément
		elements.forEach(element => {
		  // masque l'élément
		  element.style.display = 'flex';
		});
    btnLoad.style.display = 'flex';
    jsFilt.style.removeProperty('height');
    }

    if (buttonValue == "Mariage"){
		// récupère tous les éléments div ayant la classe mariage
		const elements = document.querySelectorAll('div.Concert, div.Télévision, div.Réception');
    const elementsAll = document.querySelectorAll('div.all-img');
    const btnLoad = document.getElementsByClassName('button-container-more')[0];
    const jsFilt = document.getElementsByClassName('js-filter')[0];

    // parcours chaque élément
		elementsAll.forEach(element => {
		  // masque l'élément
		  element.style.display = 'flex';
		});

		// parcours chaque élément
		elements.forEach(element => {
		  // masque l'élément
		  element.style.display = 'none';
      console.log("display none")
		});
    btnLoad.style.display = 'none';
    jsFilt.style.height = 'auto';
    }

    

    if (buttonValue == "Concert"){
		// récupère tous les éléments div ayant la classe mariage
		const elements = document.querySelectorAll('div.Mariage, div.Télévision, div.Réception');
    const elementsAll = document.querySelectorAll('div.all-img');
    const btnLoad = document.getElementsByClassName('button-container-more')[0];
    const jsFilt = document.getElementsByClassName('js-filter')[0];

    // parcours chaque élément
		elementsAll.forEach(element => {
		  // masque l'élément
		  element.style.display = 'flex';
		});

		// parcours chaque élément
		elements.forEach(element => {
		  // masque l'élément
		  element.style.display = 'none';
		});
    btnLoad.style.display = 'none';
    jsFilt.style.height = 'auto';
    }

    if (buttonValue == "Télévision"){
		// récupère tous les éléments div ayant la classe mariage
		const elements = document.querySelectorAll('div.Mariage, div.Concert, div.Réception');
    const elementsAll = document.querySelectorAll('div.all-img');
    const btnLoad = document.getElementsByClassName('button-container-more')[0];
    const jsFilt = document.getElementsByClassName('js-filter')[0];

    // parcours chaque élément
		elementsAll.forEach(element => {
		  // masque l'élément
		  element.style.display = 'flex';
		});

		// parcours chaque élément
		elements.forEach(element => {
		  // masque l'élément
		  element.style.display = 'none';
		});
    btnLoad.style.display = 'none';
    jsFilt.style.height = 'auto';
    }

    if (buttonValue == "Réception"){
		// récupère tous les éléments div ayant la classe mariage
		const elements = document.querySelectorAll('div.Mariage, div.Télévision, div.Concert');
    const elementsAll = document.querySelectorAll('div.all-img');
    const btnLoad = document.getElementsByClassName('button-container-more')[0];
    const jsFilt = document.getElementsByClassName('js-filter')[0];

    // parcours chaque élément
		elementsAll.forEach(element => {
		  // masque l'élément
		  element.style.display = 'flex';
		});

		// parcours chaque élément
		elements.forEach(element => {
		  // masque l'élément
		  element.style.display = 'none';
		});
    btnLoad.style.display = 'none';
    jsFilt.style.height = 'auto';
    }
  });
}

/*##########################################
################ FORMATS ###################
############################################*/

var buttonTwo = document.getElementById('buttonTwoForJs');
var buttonValueTwo = buttonTwo.value;

var linksTwo = document.querySelectorAll('.dropdown-content-2 a');

for (var i = 0; i < linksTwo.length; i++) {
  linksTwo[i].addEventListener('click', function() {
    buttonValueTwo = buttonTwo.value;

    console.log(buttonValueTwo);


    if (buttonValueTwo == "All"){
		// récupère tous les éléments div ayant la classe mariage
		const elements = document.querySelectorAll('div.all-img');
    const btnLoad = document.getElementsByClassName('button-container-more')[0];
    const jsFilt = document.getElementsByClassName('js-filter')[0];

		// parcours chaque élément
		elements.forEach(element => {
		  // masque l'élément
		  element.style.display = 'flex';
		});
    btnLoad.style.display = '';
    btnLoad.classList.remove('display-none-button-all');
    jsFilt.style.removeProperty('height');
    }


    if (buttonValueTwo == "Paysage"){
		// récupère tous les éléments div ayant la classe mariage
		const elements = document.querySelectorAll('div.Portrait');
    const elementsAll = document.querySelectorAll('div.all-img');
    const btnLoad = document.getElementsByClassName('button-container-more')[0];
    const jsFilt = document.getElementsByClassName('js-filter')[0];

    // parcours chaque élément
		elementsAll.forEach(element => {
		  // masque l'élément
		  element.style.display = 'flex';
		});
    
		// parcours chaque élément
		elements.forEach(element => {
		  // masque l'élément
		  element.style.display = 'none';
		});
    btnLoad.style.display = 'none';
    jsFilt.style.height = 'auto';
    }

    if (buttonValueTwo == "Portrait"){
		// récupère tous les éléments div ayant la classe mariage
		const elements = document.querySelectorAll('div.Paysage');
    const elementsAll = document.querySelectorAll('div.all-img');
    const btnLoad = document.getElementsByClassName('button-container-more')[0];
    const jsFilt = document.getElementsByClassName('js-filter')[0];

    // parcours chaque élément
		elementsAll.forEach(element => {
		  // masque l'élément
		  element.style.display = 'flex';
		});

		// parcours chaque élément
		elements.forEach(element => {
		  // masque l'élément
		  element.style.display = 'none';
		});
    btnLoad.style.display = 'none';
    jsFilt.style.height = 'auto';
    }
  });
}

/*##########################################
################ FILTRER PAR  ##############
############################################*/

var buttonThree = document.getElementById('buttonThreeForJs');
var buttonValueThree = buttonThree.value;

var linksThree = document.querySelectorAll('.dropdown-content-3 a');

for (var i = 0; i < linksThree.length; i++) {
  linksThree[i].addEventListener('click', function() {
    buttonValueThree = buttonThree.value;

    console.log(buttonValueThree);


    if (buttonValueThree == "All"){
		// récupère tous les éléments div ayant la classe mariage
		const elements = document.querySelectorAll('div.all-img');

		// parcours chaque élément
		elements.forEach(element => {
		  // masque l'élément
		  element.style.display = 'flex';
		});
    }


    if (buttonValueThree == "Nouveautés"){
				// récupère tous les éléments div ayant la classe mariage
        const elementsOne = document.getElementsByClassName('hideOne')[0];
        const elementsTwo = document.getElementsByClassName('selectTwo')[0];


        elementsTwo.classList.add('hideTwo');
        elementsOne.style.display = '';

        elementsOne.style.height = '';

        BtnContentLotMore.classList.remove('display-none-button');
        BtnContentLotMore.classList.remove('display-none-button-all');
        pageContentOne.classList.remove('display-height-button');

        
    }

    if (buttonValueThree == "Les plus populaires"){
		// récupère tous les éléments div ayant la classe mariage
		const elements = document.querySelectorAll('div.Les plus populaires');

		// parcours chaque élément
		elements.forEach(element => {
		  // masque l'élément
		  element.style.display = 'none';
		});
    }

    if (buttonValueThree == "Plus anciens"){
		// récupère tous les éléments div ayant la classe mariage
    const elementsOne = document.getElementsByClassName('hideOne')[0];
		const elementsTwo = document.getElementsByClassName('hideTwo')[0];
    const elementsTwoSecond = document.getElementsByClassName('selectTwo')[0];

    elementsOne.style.display = 'none';
    elementsTwo.classList.remove('hideTwo');


    elementsTwoSecond.style.height = '';

    BtnContentLotMore.classList.remove('display-none-button');
    BtnContentLotMore.classList.remove('display-none-button-all');
    pageContentTwo.classList.remove('display-height-button');
    }
  });
}


/*##########################################
################ GENERAL FORMULAIRE ########
############################################*/

window.onclick = function(e) {
  if (!e.target.matches('.dropbtn-1')) {
    var myDropdown1 = document.getElementById("myDropdown-1");
    if (myDropdown1.classList.contains('show-1')) {
      myDropdown1.classList.remove('show-1');
    }
  }
}

/*##########################################
################ PREMIER FORMULAIRE ########
############################################*/

function myFunction() {
  document.getElementById("myDropdown-1").classList.toggle("show-1");
}

let isRotated1 = false;

const littleArrow1 = document.querySelector('.arrow-1');

document.querySelector('.dropdown-1').addEventListener('click', function() {
  if (isRotated1) {
    littleArrow1.style.transform = 'rotate(0deg)';
    isRotated1 = false;
  } else {
    littleArrow1.style.transform = 'rotate(180deg)';
    isRotated1 = true;
  }
});


const monBouton = document.querySelector('.dropbtn-1');
monBouton.value = monBouton.textContent;

function changeTextOne(newTextOne) {
  const monBouton = document.querySelector('.dropbtn-1');
  monBouton.textContent = newTextOne;
  monBouton.value = newTextOne;
}

/*##########################################
################ DEUXIEME FORMULAIRE #######
############################################*/

function myFunctionTwo() {
  document.getElementById("myDropdown-2").classList.toggle("show-2");
}

let isRotated2 = false;

const littleArrow2 = document.querySelector('.arrow-2');

document.querySelector('.dropdown-2').addEventListener('click', function() {
  if (isRotated2) {
    littleArrow2.style.transform = 'rotate(0deg)';
    isRotated2 = false;
  } else {
    littleArrow2.style.transform = 'rotate(180deg)';
    isRotated2 = true;
  }
});

const monBouton2 = document.querySelector('.dropbtn-2');
monBouton2.value = monBouton2.textContent;

function changeTextTwo(newTextTwo) {
  const monBouton2 = document.querySelector('.dropbtn-2');
  monBouton2.textContent = newTextTwo;
  monBouton2.value = newTextTwo;
}

/*##########################################
################ TROISIEME FORMULAIRE ######
############################################*/

function myFunctionThree() {
  document.getElementById("myDropdown-3").classList.toggle("show-3");
}

let isRotated3 = false;

const littleArrow3 = document.querySelector('.arrow-3');

document.querySelector('.dropdown-3').addEventListener('click', function() {
  if (isRotated3) {
    littleArrow3.style.transform = 'rotate(0deg)';
    isRotated3 = false;
  } else {
    littleArrow3.style.transform = 'rotate(180deg)';
    isRotated3 = true;
  }
});

const monBouton3 = document.querySelector('.dropbtn-3');
monBouton3.value = monBouton3.textContent;

function changeTextThree(newTextThree) {
  const monBouton3 = document.querySelector('.dropbtn-3');
  monBouton3.textContent = newTextThree;
  monBouton3.value = newTextThree;
}

/*############################################################
####################### DETECTION ANIMATION ##################
##############################################################
*/


// Obtenir tous les éléments à animer
var elements = document.querySelectorAll('.container ,#footer-menu, .button-container-more, .home-img, .dropdown-1, .dropdown-2, .dropdown-3, .first-title-filter, .second-title-filter, .third-title-filter, .header-menu');

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
