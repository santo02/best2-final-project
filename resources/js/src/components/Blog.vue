<template>
    <form>
        <div class="mb-3">
        <h1 class="h2 mt-5">Buat Blog Baru</h1>
          <label for="Title" class="form-label">Judul </label>
          <input type="Title" class="form-control" id="Title">
        </div>
        <div class="mb-3">
          <label for="Slug" class="form-label">Slug</label>
          <input type="Slug" class="form-control" id="Slug">
        </div>
        <div class="mb-3">
          <label for="Gambar" class="form-label">Gambar</label>
          <input type="Gambar" class="form-control" id="Gambar">
        </div>
        <div class="mb-3">
          <label for="Category" class="form-label">Kategori</label>
          <input type="Category" class="form-control" id="Category">
        </div>
        <div class="mb-3">
          <label for="Content" class="form-label">Isi</label>
          <input type="Content" class="form-control" id="Content">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</template>

<script>
export default {
  name: "Blog",
};
</script>