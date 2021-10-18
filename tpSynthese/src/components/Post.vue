<!-- SECTION HTML -->
<template>
    <div>
      <div className="conteneurInfo">
        <div className="conteneurThumbnail">
          <img :src="post.thumbnail" alt="Image" className="thumbnail" />
        </div>
        <div className="info">
          <h5 className="titre">{{ post.titre }}</h5>
          <router-link :to="'/recette/' + post.id">Voir</router-link>
        </div>
      </div>
    </div>
</template>

<!-- SECTION CODE -->
<script>
export default {
  name: "Post",
  props: ["post"],
};
</script>

<!-- SECTION STYLE -->
<style scoped>
.conteneurInfo {
  margin: 15px;
  height: 100%;
}
.thumbnail {
  object-fit: cover;
}
</style>