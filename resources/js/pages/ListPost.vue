<template>
  <div>
    <h3 class="text-center">All Posts</h3>
    <br />

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Description</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="post in posts" :key="post.id">
          <td>{{ post.id }}</td>
          <td>{{ post.title }}</td>
          <td>{{ post.description }}</td>
          <td>{{ post.created_at | formatDate }}</td>
          <td>{{ post.updated_at | formatDate }}</td>
          <td>
            <div class="btn-group" role="group">
              <router-link
                :to="{ name: 'edit', params: { id: post.id, title: post.title, description: post.description} }"
                class="btn btn-primary"
                >Edit
              </router-link>
              <button class="btn btn-danger" @click="deletePost(post.id)">
                Delete
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
import moment from 'moment';
export default {
  data() {
    return {
      posts: [],
    };
  },
  created() {
    axios.get("/api/post/posts").then((response) => {
      this.posts = response.data;
      console.log(this.posts);
    });
  },
  methods: {
    deletePost(id) {
      axios.post(`/api/post/delete/${id}`).then((response) => {
        let i = this.posts.map((item) => item.id).indexOf(id);
        this.posts.splice(i, 1);
      });
    },
  },
  filters: {
    formatDate : function (date) {
      return moment(String(date)).format('MM/DD/YYYY')
    },
  },
};
</script>