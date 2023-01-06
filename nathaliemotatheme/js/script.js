const mobileElements = document.getElementsByClassName('menu-img-mobile')[0];
const mobileNavBar = document.getElementsByClassName('navbar-mobile')[0];
const mobileNavBarTwo = document.getElementsByClassName('menuClose-img-mobile')[0];
const secondButton = document.getElementsByClassName('myBtnP')[0];


/*############################################################
####################### MODAL ################################
##############################################################
*/

// Get the modal
var modal = document.getElementById('myModal');

// Get all the elements with the class "myBtn"
var btns = document.getElementsByClassName("myBtn");


// Get the <span> element that closes the modal
var span = document.getElementById("close");


// Loop through all the elements and add an onclick event listener to each one
for (var i = 0; i < btns.length; i++) {
    btns[i].onclick = function() {
        modal.style.display = "block";
        console.log("Salut");
        mobileNavBar.style.display = 'none';
        mobileNavBarTwo.style.display = 'none';
        mobileElements.classList.add('display-flex-button');
    }
}


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        mobileElements.style.display = '';
    }
}

secondButton.addEventListener('click', function() {
    mobileNavBar.style.display = 'none';
    mobileNavBarTwo.style.display = 'none';
    mobileElements.classList.add('display-flex-button');

});

mobileElements.addEventListener('click', function() {
    mobileNavBar.style.display = 'flex';
    mobileElements.style.display = 'none';
    mobileNavBarTwo.style.display = 'flex';

});

mobileNavBarTwo.addEventListener('click', function() {
    mobileNavBarTwo.style.display = 'none';
    mobileNavBar.style.display = 'none';
    mobileElements.style.display = 'flex';

});