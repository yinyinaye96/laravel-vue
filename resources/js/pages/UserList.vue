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
        <tr v-for="(user, index) in users.data" :key="user.id">
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
              <button
                class="btn btn-danger"
                @click="deleteUser(index, user.id)"
              >
                Delete
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <vue-pagination :pagination="users" @paginate="getPosts()" :offset="4">
    </vue-pagination>
  </div>
</template>
<script>
import moment from "moment";
import VuePagination from "./pagination";
export default {
  data() {
    return {
      users: {
        total: 0,
        per_page: 3,
        from: 1,
        to: 0,
        current_page: 1,
      },
      offset: 4,
    };
  },
  components: {
    VuePagination,
  },
  created() {
    this.getPosts();
  },
  methods: {
    getPosts() {
      axios
        .get(`/api/user/users?page=${this.users.current_page}`)
        .then((response) => {
          this.users = response.data;
        })
        .catch(() => {
          console.log("handle server error from here");
        });
    },
    deleteUser(index, id) {
      if (confirm("Are you sure you want to remove this user?")) {
        axios.post(`/api/user/delete/${id}`).then((response) => {
          this.users.data.splice(index, 1);
        });
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