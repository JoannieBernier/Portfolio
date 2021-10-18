<!-- SECTION HTML -->
<template>
    <div class="etape">
        <ol>
            <h3>Étapes de préparation</h3>
            <div v-for="etape in recette.preparation" :key="etape" :recette="etape">
                <li>
                    {{ etape }}
                </li>
            </div>
        </ol>
    </div>
</template>

<!-- SECTION CODE -->
<script>
export default {
    name: "Etape",
    props: ["recette"],   
};
</script>

<!-- SECTION STYLE -->
<style scoped>
.etape {
    background-color: #e8e8e8;
    padding: 20px;
}
li {
    padding-top: 8px;    
}
</style>