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
        <tr v-for="post in displayedPosts" :key="post.id">
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
              <button class="btn btn-danger" @click="deletePost(post.id)">
                Delete
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <button
            type="button"
            class="page-link"
            v-if="page != 1"
            @click="page--"
          >
            Previous
          </button>
        </li>
        <li class="page-item">
          <button
            type="button"
            class="page-link"
            v-for="pageNumber in pages.slice(page - 1, page + 5)"
            :key="pageNumber"
            @click="page = pageNumber"
          >
            {{ pageNumber }}
          </button>
        </li>
        <li class="page-item">
          <button
            type="button"
            class="page-link"
            @click="page++"
            v-if="page < pages.length"
          >
            Next
          </button>
        </li>
      </ul>
    </nav>
  </div>
</template>
<script>
import moment from "moment";
export default {
  data() {
    return {
      posts: [],
      page: 1,
      perPage: 5,
      pages: [],
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
    paginate(posts) {
      let page = this.page;
      let perPage = this.perPage;
      let from = page * perPage - perPage;
      let to = page * perPage;
      return posts.slice(from, to);
    },
  },
  computed: {
    displayedPosts() {
      return this.paginate(this.posts);
    },
  },
  watch: {
    posts() {
      let numberOfPages = Math.ceil(this.posts.length / this.perPage);
      for (let index = 1; index <= numberOfPages; index++) {
        this.pages.push(index);
      }
    },
  },
  filters: {
    formatDate: function (date) {
      return moment(String(date)).format("MM/DD/YYYY");
    },
  },
};
</script>