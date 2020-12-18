<template>
  <div>
    <h3 class="text-center">Edit Post</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="updatePost" id="form">
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" v-model="title" />
          </div>
          <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" v-model="description" />
          </div>
          <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      posts: [],
    };
  },
  methods: {
    updatePost() {
      axios
        .post(`/api/update/${this.$route.params.id}`, this.post)
        .then((response) => {
          this.$router.push({ name: "posts" });
        });
    },
  },
};
</script>