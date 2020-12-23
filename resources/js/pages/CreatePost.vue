<template>
  <div>
    <h3 class="text-center">Add Post</h3>
    <div class="row">
      <div class="col-md-6">
        <div v-if="validationErrors">
          <p class="alert alert-danger">{{ validationErrors }}</p>
        </div>
        <form @submit.prevent="addPost">
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" v-model="post.title" />
            <p class="text-danger">{{ errors.title }}</p>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea
              class="form-control"
              v-model="post.description"
            ></textarea>
            <p class="text-danger">{{ errors.description }}</p>
          </div>
          <button type="submit" class="btn btn-primary">Add Post</button>
        </form>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      post: {},
      errors: {},
      validationErrors: "",
    };
  },
  methods: {
    addPost() {
      axios
        .post("/api/post/create", this.post)
        .then((response) => this.$router.push({ name: "posts" }))
        .catch((err) => {
          this.validationErrors = err.response.data.message;
          this.errors.title = err.response.data.errors.title[0];
          this.errors.description = err.response.data.errors.description[0];
        });
    },
  },
};
</script>