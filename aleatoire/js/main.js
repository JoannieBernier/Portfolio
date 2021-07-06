// Créer la balle 
const div = document.createElement("div")
document.body.appendChild(div)
div.classList.add("balle")
let balle = document.querySelector(".balle")

// Variable nécessaire pour déplacer la balle
let x = 0
let y = 0
let dx = 2
let dy = 2
let largeur = window.innerWidth -50 // La largeur actuelle de l'écran moins les 50 pixels de la balle
let hauteur = window.innerHeight - 50 // La hauteur actuelle de l'écran moins les 50 pixels de la balle

// Fonction qui change la couleur de la balle à chaque click
div.addEventListener("click", function(){
    let r = aleatoire_entier(0, 255)
    let g = aleatoire_entier(0, 255)
    let b = aleatoire_entier(0, 255)
    div.style.backgroundColor = `rgb(${r},${g},${b})`
})

// Fonction qui déplacement aléatoirement la balle dans l'écran
function deplacement() {

    largeur = window.innerWidth -50
    hauteur = window.innerHeight - 50
    balle.style.left = x + "px"
    balle.style.top = y + "px"

    if(x + dx > largeur || x + dx < 0){
        dx = -dx
    }

    if(y + dy > hauteur  || y + dy < 0){
        dy = -dy
    }

    x += dx
    y += dy

    // Demande au navigateur de relancer la fonction déplacement dès que possible
    window.requestAnimationFrame(deplacement)
}

// Lance le premier déplacement
deplacement()