<!-- SECTION HTML -->
<template>
    <div class="commentaires">
        <ul>
            <h3>Commentaires des utilisateurs</h3>
            <div v-for="commentaire in recette.commentaires" :key="commentaire" :recette="commentaire" class="commentaire">
                <li>
                    <span class="utilisateur">{{ commentaire.utilisateur }}</span>
                </li>
                <li>
                    {{ commentaire.texte }}
                </li>
            </div>
        </ul>
    </div>
</template>

<!-- SECTION CODE -->
<script>
export default {
    name: "Commentaire",
    props: ["recette"],   
};
</script>

<!-- SECTION STYLE -->
<style scoped>
.commentaires {
    padding: 20px;
}
.commentaires ul {
    list-style-type: none;
}
.commentaire {
    padding-top: 8px;    
}
.utilisateur {
    font-weight: bold; 
}
</style>