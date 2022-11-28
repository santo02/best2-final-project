<template>
    <div>
         <section class="py-5 mt-5">
        <div class="container py-5">
            <div class="card">
            <h3 class="text-center mb-4">My Article</h3>
            <div class="card p-3" style="border-width: 1px;border-style: solid;">
                    <div class="card-body">
                        <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th style="width: 25%">Title</th>
                <th style="width: 15%">Category</th>
                <th style="width: 15%">Writer</th>
                <th style="width: 30%">Article</th>
                <th style="width: 15%">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="post in posts" :key="post.post_id">
                <td>{{ post.title }}</td>
                <td>{{ post.category }}</td>
                <td>{{ post.user_id}}</td>
                <td>{{ post.post_detail.substring(0, 200) }}...</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'update-blog', params: { id: post.post_id }}" class="btn btn-sm  btn-success">Edit</router-link>
                        <button class="btn btn-sm btn-danger" @click="deleteposts(post.post_id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
        </div></div>
        </div></div></section>
    </div>
</template>
 
<script>
    export default {
        name: "ListPost",
        data() {
            return {
                user: [],
                isLoggedIn: false,
                posts: []
            }
        },
        created() {
            this.user = JSON.parse(localStorage.getItem('user'))
            this.isLoggedIn = localStorage.getItem('token') != null
            if(!this.user && !this.loggedIn) {
                console.log('Please login first!')
            } else {
                this.axios
                    .get(`/api/posts/my/${this.user.id}`)
                    .then(response => {
                        this.posts = response.data;
                        // console.log(this.posts)
                    });
            }
        },
        methods: {          
            deleteposts(id) { 
                this.axios
                    .delete(`/api/posts/delete/${id}`)
                    .then(response => {
                        let i = this.posts.map(data => data.post_id).indexOf(id);
                        this.posts.splice(i, 1)
                    });
            }
        }
    }
</script>
