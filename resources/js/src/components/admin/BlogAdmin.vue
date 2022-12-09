<template>
  <section class="py-2 mt-5">
    <div class="container py-5">
      <div class="card">
        <h3 class="mb-4">Semua Blog</h3>
        <div class="position-absolute top-0 end-0">
          <router-link to="add-blog">
            <button class="btn btn-primary btn-md">New Blog</button>
          </router-link>
        </div>
        <div class="card p-3" style="border-width: 1px;border-style: solid;">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th style="width: 25%">Post date</th>
                    <th style="width: 25%">Title</th>
                    <th style="width: 15%">Category</th>
                    <th style="width: 15%">Writer</th>
                    <th style="width: 30%">Article</th>
                    <th style="width: 15%">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="b in blogs" :key="b.post_id">
                    <td><small>{{ b.created_at }}</small></td>
                    <td>{{ b.title }}</td>
                    <td>{{ b.Categories_name }}</td>
                    <td>{{ b.username }}</td>
                    <td>{{ b.post_detail.substring(0, 100) }}...</td>
                    <td>
                      <div class="btn-group" role="group">
                        <router-link :to="{ name: 'update-blog', params: { id: b.post_id } }"
                          class="btn btn-sm  btn-success">Edit</router-link>
                        <button class="btn btn-sm btn-danger" @click="deleteposts(b.post_id)">Delete</button>
                      </div>
                    </td>
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
  name: "BlogAdmin",
  data() {
    return {
      blogs: [],
    }

  },
  mounted() {
    this.getBlogs()
  },
  methods: {
    getBlogs() {
      axios.get('/api/all-posts')
        .then(response => {
          this.blogs = response.data
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
