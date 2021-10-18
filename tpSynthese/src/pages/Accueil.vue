<!-- SECTION HTML -->
<template>
    <div id="content">
        <header>
            <h1><router-link :to="'/'" class="routerlink">Recettes client-serveur</router-link></h1>    
        </header>
        <div className="conteneurRecette">
            <Post v-for="post in data" :key="post.id" :post="post" />
        </div>
    </div>
</template>

<!-- SECTION CODE -->
<script>
import Post from "../components/Post";

export default {
    name: 'Accueil',
    components: {
        Post,
    },
    data(){
        return {
            data: [],
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
        this.data = data.recettes;
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
.conteneurRecette {
    width: 100vw;
    min-height: 100%;
    padding-top: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
}
@media (max-width: 930px) {
    .conteneurRecette {      
        flex-direction: column;
        }
}
</style>