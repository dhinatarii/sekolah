<?php if (!isset($login)) : ?>
    <footer class="c-footer">
        <div><a href="https://coreui.io">CoreUI</a> © 2020 creativeLabs.</div>
        <div class="ml-auto">Powered by&nbsp;<a href="https://coreui.io/">CoreUI</a></div>
    </footer>
    </div>
    </div>
<?php endif ?>

<!-- CoreUI and necessary plugins-->
<script src="<?= base_url() ?>assets/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/@coreui/icons/js/svgxuse.min.js"></script>

<!-- Plugins and scripts required by this view-->
<!-- <script src="<?= base_url() ?>assets/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script> -->
<script src="<?= base_url() ?>assets/vendors/@coreui/utils/js/coreui-utils.js"></script>
<!-- <script src="<?= base_url() ?>assets/js/main.js"></script> -->

<!-- Datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/datatablesbs4.js"></script>

<!-- <script>
    $(document).ready(function() {
        $('#table').DataTable()
    })
</script> -->

</body>

</html>