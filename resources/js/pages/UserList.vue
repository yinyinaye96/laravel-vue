<template>
  <div>
    <h3 class="text-center">All Users</h3>
    <br />

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in displayedUsers" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ user.created_at | formatDate }}</td>
          <td>{{ user.updated_at | formatDate }}</td>
          <td>
            <div class="btn-group" role="group">
              <router-link
                :to="{
                  name: 'edituser',
                  params: {
                    id: user.id,
                    name: user.name,
                    email: user.email,
                    password: user.password,
                  },
                }"
                class="btn btn-primary"
                >Edit
              </router-link>
              <button class="btn btn-danger" @click="deletePost(user.id)">
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
      users: [],
      page: 1,
      perPage: 1,
      pages: [],
    };
  },
  created() {
    axios.get("/api/user/users").then((response) => {
      this.users = response.data;
    });
  },
  methods: {
    deletePost(id) {
      axios.post(`/api/user/delete/${id}`).then((response) => {
        let i = this.users.map((item) => item.id).indexOf(id);
        this.users.splice(i, 1);
      });
    },
    paginate(users) {
      let page = this.page;
      let perPage = this.perPage;
      let from = page * perPage - perPage;
      let to = page * perPage;
      return users.slice(from, to);
    },
  },
  computed: {
    displayedUsers() {
      return this.paginate(this.users);
    },
  },
  watch: {
    users() {
      let numberOfPages = Math.ceil(this.users.length / this.perPage);
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