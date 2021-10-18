<!-- SECTION HTML -->
<template>
    <div>
        <h1 class="nom">{{ recette.titre }}</h1>
        <div  class="presentation">
            <img :src="recette.image" alt="Image" className="image" />
            <div>
                <div class="info">
                    <ul>
                        <li>
                        <span class="bold"> <a :href="recette.source">Lien original</a></span>
                        </li>
                        <li>
                            <span class="bold"> Préparation: </span> {{ convertirEnHeure(recette.temps_preparation) }} 
                        </li>
                        <li>
                            <span class="bold"> Cuisson: </span> {{ convertirEnHeure(recette.temps_cuisson) }}
                        </li>
                        <li v-if="recette.temps_attente">
                            <span class="bold"> Attente: </span> {{ convertirEnHeure(recette.temps_attente) }} 
                        </li>
                        <li>
                            <span class="bold"> Totale: </span> {{ convertirEnHeure(recette.temps_preparation + recette.temps_cuisson + recette.temps_attente) }}
                        </li>
                        <li v-if="recette.se_congele">
                            <span class="bold"> Se congèle </span>
                        </li>
                        <span class="conteneurEtoile">
                            <li v-for="etoile in recette.etoiles" :key="etoile" :recette="etoile">
                                <img src="../assets/star.png" alt="Etoile">
                            </li>
                        </span> 
                        <li>
                            <span class="bold"> Nombre de votes: </span> {{ nbrVote }}
                        </li>
                        <li>
                            <form action="#" method="POST" @submit.prevent="envoiVote()">
                                <input type="submit" value="J'aime cette recette" class="submit" />
                            </form>                                                       
                        </li>                                                                    
                    </ul>
                </div>
                <div class="conteneurIngredients">
                    <ul>
                        <h4>Ingrédients</h4>
                        <li v-for="ingredient in recette.ingredients" :key="ingredient.id" :recette="ingredient">
                            {{ ingredient.texte }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<!-- SECTION CODE -->
<script>
export default {
    name: "Presentation",
    props: ["recette"],
    data(){
        return {
            nbrVote: 0,
        };
    }, // FIN DATA
    methods: {
        voteNbr(id) {
            const url = `http://inter.ericgagne.net/api/synthese/votes/vote.php?id=${id}`;
            return fetch(url)
            .then((res) => res.json())
            .then((json) => {
                return json;
             });
        },
        http_post(url, informations) {
            return new Promise(function (resolve) {
                const options = {
                    method: 'POST',
                    mode: 'cors',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(informations)
                }
                fetch(url, options).then(resp => {
                    resp.json().then(resolve)
                })
            })

        },
        convertirEnHeure(temps) {
            let num = temps;
            let hours = (num / 60);
            let rhours = Math.floor(hours);
            let minutes = (hours - rhours) * 60;
            let rminutes = Math.round(minutes);
            if(num >= 60 && rminutes != 0) return rhours + "h" + rminutes;
            if(num >= 60) return rhours + "h ";
            else return num + "m";
        },
        envoiVote(){
            this.id = this.$route.params.id
            this.http_post(`http://inter.ericgagne.net/api/synthese/votes/vote.php`, {
                id: this.id,
             }).then((data) => {
                 if(data) {
                    this.voteNbr(this.$route.params.id).then((data) => {
                        this.nbrVote = data.data;
                    });
                 }
            });
        },
    },
    mounted() {
        this.voteNbr(this.$route.params.id).then((data) => {
            this.nbrVote = data.data;
        });
    },
};
</script>

<!-- SECTION STYLE -->
<style scoped>
.nom {
    font-size: 24px;
    text-align: center;
}
.image {
    width: 21vw;
    object-fit: cover;
}
.presentation {
    display: flex;
    align-items: center;
    padding: 20px;
}
.info ul {
    list-style-type: none;
}
.info li {
    margin-bottom: 5px;    
}
.bold {
    font-weight: bold; 
}
.conteneurEtoile {
    display: flex;
}
.conteneurEtoile img {
    width: 20px;
    height: 20px;
}
@media (max-width: 800px) {
    .presentation {      
        flex-direction: column;
        }
    .image {
        width: 40vw;
    }
    .info {
        text-align: center;
    }
    .info ul {
        padding-left: 0px;
    }  
    .conteneurEtoile {
        justify-content: center;
    }     
}
</style>