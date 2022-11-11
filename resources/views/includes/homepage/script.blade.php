<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/Animated-Type-Heading.js"></script>
<script src="assets/js/bold-and-bright.js"></script>
<script src="assets/js/Swiper-Slider-Card-For-Blog-Or-Product.js"></script>
<script>
    $(document).on('click', '#edit-data', function(){
        let id = $(this).data("id");

        $(".modal-body #post_id").val(id);
        $("#modal-2").modal('toggle');
    });
</script>