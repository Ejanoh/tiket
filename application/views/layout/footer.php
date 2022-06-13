</div>
<!-- Footer Start -->
<div class="mt-2">
    <div class="bg-light rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                &copy; Argh
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
</div>
<!-- Content End -->


<!-- Back to Top -->
<!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->
</div>
<!-- Script Menghilangkan Alert -->
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>

<!-- JavaScript Libraries -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="<?= base_url('assets') ?>/lib/chart/chart.min.js"></script>
<script src="<?= base_url('assets') ?>/lib/easing/easing.min.js"></script>
<script src="<?= base_url('assets') ?>/lib/waypoints/waypoints.min.js"></script>
<script src="<?= base_url('assets') ?>/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?= base_url('assets') ?>/lib/tempusdominus/js/moment.min.js"></script>
<script src="<?= base_url('assets') ?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="<?= base_url('assets') ?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="<?= base_url('assets') ?>/js/main.js"></script>
</body>

</html>