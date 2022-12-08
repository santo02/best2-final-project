<template>
    <section class="py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-5 offset-lg-0">
                    <div class="card" style="margin-top: 45px;border-radius: 1px;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border-width: 3px;border-style: dashed;">
                        <div class="card-body text-center">
                            <h3 class="fw-bold">My Profile</h3>
                            <img class="rounded-circle" height="210" width="800" :src="this.$store.state.user.image" style="margin-bottom: 12px;width: 214px;">
                            <div class="col">
                                <div class="row">
                                    <div class="col-auto">
                                        <p class="fw-normal">Name:</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -20px;">
                                    <div class="col-auto">
                                        <p class="fw-semibold">{{this.$store.state.user.name}}</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -10px;">
                                    <div class="col-auto">
                                        <p class="fw-normal">Username:</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -20px;">
                                    <div class="col-auto">
                                        <p class="fw-semibold">@{{this.$store.state.user.username}}</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -10px;">
                                    <div class="col-auto">
                                        <p class="fw-normal">Joined:</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -20px;margin-bottom: -20px;">
                                    <div class="col-auto">
                                        <p class="fw-semibold">{{this.$store.state.user.created_at}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <section class="position-relative py-4 py-xl-5">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-6 col-xl-4" style="width: 543px;margin-top: 0px;">
                                    <div class="card text-center mb-5">
                                        <div class="card-body text-center d-flex flex-column align-items-center">
                                            <div>
                                                <h1 style="font-size: 19px;font-weight: bold;margin-bottom: 35px;">Edit Profile Menu</h1>
                                            </div>
                                            <div style="margin-top: -36px;border-color: var(--bs-card-cap-bg);border-radius: 8px;">
                                                <hr style="width: 130px;margin-top: 0px;color: var(--bs-blue);border-radius: 32px;border-width: 5px;">
                                            </div>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-success" type="button" @click="username">Username</button>
                                                <button class="btn btn-success" type="button" @click="name">Name</button>
                                                <button class="btn btn-success" type="button" @click="photo">Photo</button>
                                            </div>
                                            <router-view></router-view>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "profile",
    data() {
        return {
            user: null,
            isLoggedIn: false,
            comment: {},
            error: null,
            message: '',
        }
    },
    mounted() {
        this.user = JSON.parse(localStorage.getItem('user'))
        this.isLoggedIn = localStorage.getItem('token') != null
        if(!this.user && !this.isLoggedIn) {
            this.$router.push('/login')
        } else {
            this.getUser(this.user.id)
            this.openNotify()
        }
    },
    methods: {
        getUser(id) {
            axios.get(`/api/user/find/${id}`) 
                .then(response => {
                    this.$store.commit("addUser", response.data)
                    console.log(this.$store.state.user)
                })
                .catch(error => {
                    console.log(response.data.errors)
                });
        },

        username() {
            this.$router.push('/profile/username')
            window.scrollTo(0,0)
        },
        name() {
            this.$router.push('/profile/name')
            window.scrollTo(0,0)
        },
        photo() {
            this.$router.push('/profile/photo')
            window.scrollTo(0,0)
        },
        openNotify() {
            this.$store.commit("addQuoteText", 'KampusMerdekaNetwork Notify')
            this.$store.commit("addQuoteOrigin", 'Halo, ' + this.user.name + '. Silahkan pilih menu yang tersedia!')

            this.$vs.notification({
                title: this.$store.state.quoteText,
                color: this.$store.state.quoteColor,
                // border: this.$store.state.quoteBorder,
                position: this.$store.state.quotePosition,
                progress: this.$store.state.quoteProgress,
                duration: this.$store.state.quoteDuration,
                text: this.$store.state.quoteOrigin
            })
        },
        addCompany() {
        let formData = new FormData();
        formData.append('file', this.file);
        formData.append('company_name', this.company_name);
        formData.append('slug', this.slug);
        console.log(this.file);
        this.axios({
            url: '/api/companies/add',
            method: 'post',
            data: formData,
            headers: {
            'Content-Type': 'multipart/form-data',
            'Acces-Control-Allow-Origin': '*',
            }
        }).then(response => (
            this.$router.push({ name: 'home' })
        ))
            .catch(err => console.log(err))
        }
    }
}
</script>