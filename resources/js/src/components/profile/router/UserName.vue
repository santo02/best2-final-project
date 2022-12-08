<template>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <form @submit.prevent="editData" class="text-center" style="width: 375.562px;">
                                <div class="mb-3">
                                    <input class="form-control" type="text" name="name" placeholder="Username" required v-model="profile.username">
                                </div>
                                <div class="mb-3" style="margin-right: 16px;">
                                    <button class="btn btn-primary d-block w-100" type="submit" style="margin-right: 0px;margin-left: 10px;">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "profile-username",
    data() {
        return {
            profile: {}
        }
    },
    methods: {
        refreshData(id) {
            axios.get(`/api/user/find/${id}`) 
                .then(response => {
                    this.$store.commit("addUser", response.data)
                })
                .catch(error => {
                    console.log(response.data.errors)
                });
        },
        editData() {
            let formData = new FormData();
            formData.append('id', this.$store.state.user.id);
            formData.append('name', this.profile.username);
            this.axios({
                url: '/api/user/change/username',
                method: 'post',
                data: formData,
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'Acces-Control-Allow-Origin': '*',
                }
            }).then(response => (
                this.refreshData(this.$store.state.user.id)
            ))
            .catch(err => console.log(err))
        }
    }
}
</script>