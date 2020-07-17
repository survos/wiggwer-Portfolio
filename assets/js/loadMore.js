import('jquery');
/**
 * function to change texte on load button
 */
//let buttonMore = document.querySelector('#more');

if (buttonMore.lenght === 0){
    
    buttonMore.addEventListener('click', function(e) {
        e.target.innerHTML = 'En savoir plus'
    });
    if (buttonMore.lenght > 1){
        buttonMore.addEventListener('click', function(e) {
            e.target.innerHTML = 'Masquer'
        });
    }
}
else {
    buttonMore.addEventListener('click', function(e) {
        e.target.innerHTML = 'En savoir plus'
    });
}

var buttonMore, button;

if (buttonMore = document.querySelector('#more')) {
    if (button = buttonMore.getElementsByTagName("button")[0]) {
        console.log(buttonMore)
        button.addEventListener("click", function() {
            this.innerHTML = "Masquer";
        }, false);
    }
}
