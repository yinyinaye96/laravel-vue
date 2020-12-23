<template>
  <div>
    <h3 class="text-center">Edit User</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="updateUser" id="form">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" v-model="name" />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" v-model="email" />
          </div>
          <div class="form-group">
            <label>Password</label>
            <input
              type="password"
              name="password"
              class="form-control"
              v-model="password"
            />
          </div>
          <button type="submit" class="btn btn-primary">Update User</button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  // data() {
  //   return {
  //     user: [],
  //   };
  // },
  // methods: {
  //   updateUser() {
  //     axios
  //       .post(`/api/user/update/${this.$route.params.id}`, this.user)
  //       .then((response) => {
  //         this.$router.push({ name: "users" });
  //       });
  //   },
  // },
  props: ["id", "name", "email", "password"],
  methods: {
    updateUser() {
      var form = document.getElementById("form");
      var formData = new FormData(form);
      axios({
        method: "post",
        url: `/api/user/update/${this.$route.params.id}`,
        data: formData,
        config: { headers: { "Content-Type": "multipart/form-data" } },
      })
        .then((response) => {
          this.$router.push({ name: "users" });
        })
        .catch((error) => {
          console.log(error.response);
        });
    },
  },
};
</script>