let conteneur_connexion = document.querySelector(".conteneur_connexion")
let connexion = document.querySelector("#connexion")
let projet = document.querySelectorAll(".projet")
let conteneur_description = document.querySelectorAll(".conteneur_description")

if(connexion) {
connexion.addEventListener("click", e => {
    e.preventDefault()

    if (conteneur_connexion.style.visibility == "visible"){
        conteneur_connexion.style.visibility = "hidden"
    }
    else {
    conteneur_connexion.style.visibility = "visible"
    }
})
}

if(projet) {
    for (i = 0; i < projet.length; i++) {

        let element = projet[i]
        let element_description = conteneur_description[i]

        element.addEventListener("mouseover", e => {

            element_description.style.visibility = "visible"
            
        })

        element.addEventListener("mouseleave", e => {

            element_description.style.visibility = "hidden"

        })
    }
}
