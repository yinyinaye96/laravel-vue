<template>
  <div>
    <h3 class="text-center">Edit Post</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="updatePost" id="form">
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" v-model="title" />
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" v-model="description"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["id", "title", "description"],
  methods: {
    updatePost() {
      var form = document.getElementById("form");
      var formData = new FormData(form);
      axios({
        method: "post",
        url: `/api/post/update/${this.$route.params.id}`,
        data: formData,
        config: { headers: { "Content-Type": "multipart/form-data" } },
      })
       .then((response) => {
          this.$router.push({ name: "posts" });
        })
        .catch((error) => {
          console.log(error.response);
        });
    },
  },
};
</script>