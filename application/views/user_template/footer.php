<div class="row">
    <div class="col-md-12">
        <div class="jumbotronbawah">
            <div class="row">
                <div class="col-md-4">
                    <?php
                    $this->load->view('user_template/v_footer_kiri');
                    ?>
                </div>
                <div class="col-md-4">
                    <?php
                    $this->load->view('user_template/v_footer_tengah');
                    ?>
                </div>
                <div class="col-md-4">
                    <?php
                    $this->load->view('user_template/v_footer_kanan');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/_users/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/_users/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Data Tables -->
<script src="<?php echo base_url() ?>assets/_users/pluginss/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/_users/pluginss/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/_users/pluginss/datatables-responsive/js/dataTables.responsive.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/_users/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/_users/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/_users/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/_users/dist/js/demo.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>