<template>
  <section class="py-2 mt-5">
    <div class="container py-5">
      <div class="card">
        <h3 class="mb-4">Semua Blog</h3>
        <div v-if="message" class="alert alert-success" role="alert">
          {{ message }}
        </div>

        <div v-if="error" class="alert alert-danger ">
          {{ error }}
        </div>
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
                  <tr v-for="b in blogs" :key="b.id">
                    <td><small>{{ b.created_at }}</small></td>
                    <td>{{ b.title }}</td>
                    <td>{{ b.Categories_name }}</td>
                    <td>{{ b.username }}</td>
                    <td>{{ b.preview.substring(0, 100) }}...</td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <div>
                          <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            :data-bs-target="'#DeleteModal' + b.id">Delete</button>
                        </div>
                        <!-- <router-link :to="{name: 'single-post', params: {id: b.id} }"> -->
                        <router-link :to="{ name: 'single-post', params: { id: b.id } }">
                          <button class="btn btn-sm btn-success" data-bs-toggle="modal">Lihat</button>
                        </router-link>
                      </div>
                      <!-- Modal -->
                      <div class="modal fade" :id="'DeleteModal' + b.id" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><b>Hapus post</b> </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Apakah anda ingin menghapus <b>{{ b.title }}</b>?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tidak</button>
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                @click="deletePost(b.id)">Ya</button>
                            </div>
                          </div>
                        </div>
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
      error: null,
      message: '',
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
    deletePost(id) {
      axios.delete(`/api/posts/delete/${id}`)
        .then(response => {
          let i = this.blogs.map(data => data.id).indexOf(id);
          this.blogs.splice(i, 1);
          this.message = response.data.message;
        });
    }
  }
}
</script>
