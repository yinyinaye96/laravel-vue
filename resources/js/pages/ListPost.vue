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
        <tr v-for="(post, index) in posts.data" :key="post.id">
          <td>{{ post.id }}</td>
          <td>{{ post.title }}</td>
          <td>{{ post.description }}</td>
          <td>{{ post.created_at | formatDate }}</td>
          <td>{{ post.updated_at | formatDate }}</td>
          <td>
            <div class="btn-group" role="group">
              <router-link
                :to="{
                  name: 'edit',
                  params: {
                    id: post.id,
                    title: post.title,
                    description: post.description,
                  },
                }"
                class="btn btn-primary"
                >Edit
              </router-link>
              <button
                class="btn btn-danger"
                @click="deletePost(index, post.id)"
              >
                Delete
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <vue-pagination :pagination="posts" @paginate="getUsers()" :offset="4">
    </vue-pagination>
  </div>
</template>
<script>
import moment from "moment";
import VuePagination from "./pagination";
export default {
  data() {
    return {
      posts: {
        total: 0,
        per_page: 3,
        from: 1,
        to: 0,
        current_page: 1,
      },
      offset: 4,
    };
  },
  created() {
    this.getUsers();
  },
  methods: {
    getUsers() {
      axios
        .get(`/api/post/posts?page=${this.posts.current_page}`)
        .then((response) => {
          this.posts = response.data;
        })
        .catch(() => {
          console.log("handle server error from here");
        });
    },
    deletePost(index, id) {
      if (confirm("Are you sure you want to remove this post?")) {
        axios.post(`/api/post/delete/${id}`).then((response) => {
          this.posts.data.splice(index, 1);
        });
      }
    },
  },
  components: {
    VuePagination,
  },
  filters: {
    formatDate: function (date) {
      return moment(String(date)).format("MM/DD/YYYY");
    },
  },
};
</script>