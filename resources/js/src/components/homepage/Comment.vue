<template>
    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4" style="width: 1168px;">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5">
                            <h2 class="text-center mb-4">Comments</h2>
                            <form method="post" style="form-horizontal">
                                <div class="mb-3"><textarea class="form-control" id="message-2" name="message" rows="6" placeholder="Message"></textarea></div>
                                <div><button class="btn btn-primary d-block w-100" style="margin-bottom: 50px;" type="submit">Send </button></div>
                            </form>
                            <div class="card">
                                <div class="card-body" style="height: 140px;margin-top: -20px;">
                                    <ul class="list-group">
                                        <li class="list-group-item" style="margin-bottom:6px;">
                                            <div class="d-flex media">
                                                <div></div>
                                                <div class="media-body">
                                                    <div class="d-flex media" style="overflow:visible;">
                                                        <div><img class="rounded-circle me-3" style="width: 25px; height:25px;" src="assets/img/ava1.jpg"></div>
                                                        <div style="overflow:visible;" class="media-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p><a href="#">Sara Doe:</a> This guy has been going 100+ MPH on side streets. <br>
                                                                    <small class="text-muted">August 6, 2016 @ 10:35am </small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body" style="height: 140px;margin-top: -20px;">
                                    <ul class="list-group">
                                        <li class="list-group-item" style="margin-bottom:6px;">
                                            <div class="d-flex media">
                                                <div></div>
                                                <div class="media-body">
                                                    <div class="d-flex media" style="overflow:visible;">
                                                        <div><img class="rounded-circle me-3" style="width: 25px; height:25px;" src="assets/img/ava1.jpg"></div>
                                                        <div style="overflow:visible;" class="media-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p><a href="#">Sara Doe:</a> This guy has been going 100+ MPH on side streets. <br>
                                                                    <small class="text-muted">August 6, 2016 @ 10:35am </small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body" style="height: 140px;margin-top: -20px;">
                                    <ul class="list-group">
                                        <li class="list-group-item" style="margin-bottom:6px;">
                                            <div class="d-flex media">
                                                <div></div>
                                                <div class="media-body">
                                                    <div class="d-flex media" style="overflow:visible;">
                                                        <div><img class="rounded-circle me-3" style="width: 25px; height:25px;" src="assets/img/ava1.jpg"></div>
                                                        <div style="overflow:visible;" class="media-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p><a href="#">Sara Doe:</a> This guy has been going 100+ MPH on side streets. <br>
                                                                    <small class="text-muted">August 6, 2016 @ 10:35am </small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body" style="height: 140px;margin-top: -20px;">
                                    <ul class="list-group">
                                        <li class="list-group-item" style="margin-bottom:6px;">
                                            <div class="d-flex media">
                                                <div></div>
                                                <div class="media-body">
                                                    <div class="d-flex media" style="overflow:visible;">
                                                        <div><img class="rounded-circle me-3" style="width: 25px; height:25px;" src="assets/img/ava1.jpg"></div>
                                                        <div style="overflow:visible;" class="media-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p><a href="#">Sara Doe:</a> This guy has been going 100+ MPH on side streets. <br>
                                                                    <small class="text-muted">August 6, 2016 @ 10:35am </small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body" style="height: 140px;margin-top: -20px;">
                                    <ul class="list-group">
                                        <li class="list-group-item" style="margin-bottom:6px;">
                                            <div class="d-flex media">
                                                <div></div>
                                                <div class="media-body">
                                                    <div class="d-flex media" style="overflow:visible;">
                                                        <div><img class="rounded-circle me-3" style="width: 25px; height:25px;" src="assets/img/ava1.jpg"></div>
                                                        <div style="overflow:visible;" class="media-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p><a href="#">Rafie Akmal:</a> This guy has been going 100+ MPH on side streets. <br>
                                                                    <small class="text-muted">August 6, 2016 @ 10:35am </small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        name: 'comment-article',
        mounted() {
            console.log('Comment Article component mounted.')
        }
    }
</script>