<template>
    <section class="py-5 mt-5">
        <div class="container py-5">
            <div class="card">
                <h3 class="text-center">Tambah Post Baru</h3>
                <div class="card" style="border-width: 3px;border-style: dashed;">
                    <div class="card-body">
                        <form class="text-start" method="post">
                            <div class="mb-3">
                                <label class="form-label">Choose Image</label>
                                <input class="form-control" type="file">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input class="form-control" type="text" name="judul">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <input class="form-control" type="text" name="slug">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select" name="kategori">
                                    <optgroup label="This is a group">
                                        <option value="12" selected="">This is item 1</option>
                                        <option value="13">This is item 2</option>
                                        <option value="14">This is item 3</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Isi</label>
                                <textarea class="form-control" name="isi"></textarea>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-block w-100" type="submit">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
  name: "Blog",
};
</script>