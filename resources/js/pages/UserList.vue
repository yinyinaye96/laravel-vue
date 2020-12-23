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
        <tr v-for="user in users" :key="user.id">
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
  </div>
</template>
<script>
import moment from "moment";
export default {
  data() {
    return {
      users: [],
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
  },
  filters: {
    formatDate: function (date) {
      return moment(String(date)).format("MM/DD/YYYY");
    },
  },
};
</script>