<!-- SECTION HTML -->
<template>
    <div id="content">
        <main>
            <header>
            <h1><router-link :to="'/'" class="routerlink">Recettes client-serveur</router-link></h1>              
            </header>
            <div class="recette">
                <Presentation :recette="recette"/>
                <Etape :recette="recette"/>
                <Commentaire :recette="recette"/> 
            </div>
        </main>
    </div>
</template>

<!-- SECTION CODE -->
<script>
import Presentation from "../components/Presentation";
import Etape from "../components/Etape";
import Commentaire from "../components/Commentaire";

export default {
    name: 'Recette',
    components: {
       Presentation,
       Etape,
       Commentaire,
    },    
    data(){
        return {
            recette: {},
            id: 0,
        };
    }, // FIN DATA
    methods: { 
        request() {
            const url = `http://inter.ericgagne.net/api/synthese/recettes.json`;
            return fetch(url)
            .then((res) => res.json())
            .then((json) => {
                return json;
             });
        },
    },
    mounted() {
        this.request().then((data) => {
        this.id = this.$route.params.id;
        for (const recette of data.recettes) {
                if(recette.id == this.id) {
                    this.recette = recette
                }
            }
        });
  },
}
</script>

<!-- SECTION STYLE -->
<style scoped>
header {
    width: 100%;
    height: 20vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: 
    linear-gradient(
    rgba(245,245,245, 0.6), 
    rgba(245,245,245, 0.6)
    ),
    /* your image */
    url("../assets/background.jpg");
    background-size: cover;  
}
header .routerlink {
    text-decoration: none;
    color: #000;
}
.recette {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>