<template>
  <div>
    <h3 class="text-center">Add User</h3>
    <div class="row">
      <div class="col-md-6">
        <div v-if="validationErrors">
          <p class="alert alert-danger">{{ validationErrors }}</p>
        </div>
        <form @submit.prevent="addUser">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="user.name" />
            <p class="text-danger">{{ errors.name }}</p>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" v-model="user.email" />
            <p class="text-danger">{{ errors.email }}</p>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" v-model="user.password" />
            <p class="text-danger">{{ errors.password }}</p>
          </div>
          <button type="submit" class="btn btn-primary">Add User</button>
        </form>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      user: {},
      errors: {},
      validationErrors: "",
    };
  },
  methods: {
    addUser() {
      axios
        .post("/api/user/create", this.user)
        .then((response) => this.$router.push({ name: "users" }))
        .catch((err) => {
          this.validationErrors = err.response.data.message;
          this.errors.name = err.response.data.errors.name[0];
          this.errors.email = err.response.data.errors.email[0];
          this.errors.password = err.response.data.errors.password[0];
        });
    },
  },
};
</script>