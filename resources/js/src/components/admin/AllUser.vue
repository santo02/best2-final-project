<template>
  <section class="py-2 mt-5">
    <div class="container py-5">
      <div class="card">
        <h3 class="mb-4">All Users</h3>
        <div class="position-absolute top-0 end-0">
        </div>
        <div class="card p-3" style="border-width: 1px;border-style: solid;">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th style="width: 25%">Image</th>
                    <th style="width: 25%">Name</th>
                    <th style="width: 25%">username</th>
                    <th style="width: 15%">email</th>
                    <th style="width: 15%">Join date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="u in allusers" :key="u.id">
                    <td>
                      <div v-if="(u.image == null)">
                        Not Set</div><img class="rounded-circle" iheight="50" width="50" :src="u.image">
                    </td>
                    <td>{{ u.name }}</td>
                    <td>{{ u.username }}</td>
                    <td>{{ u.email }}</td>
                    <td>{{ u.created_at.substring(0, 10) }}</td>

                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>

export default {
  name: "AllUser",
  data() {
    return {
      allusers: [],
    }

  },
  mounted() {
    this.getAllUsers()
  },
  methods: {
    getAllUsers() {
      axios.get('/api/all-user')
        .then(response => {
          this.allusers = response.data
        })
        .catch(error => {
          console.log(error)
        });
    },
    // deleteCate(id) {
    //   axios.delete(`/api/categories/delete/${id}`)
    //     .then(response => {
    //       let i = this.categories.map(data => data.id).indexOf(id);
    //       this.categories.splice(i, 1)
    //     });
    // }
  }
}
</script>
