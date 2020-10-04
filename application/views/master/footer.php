<footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div><a href="#">Smart Shopping</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/jquery.min.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/moment.min.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/js/stisla.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/js/swal/sweetalert2.all.min.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/js/swal/myownscriptswal.js"></script>
  
  <!-- JS Libraies -->
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?= base_url('vendor/dist/'); ?>assets/js/datatables/datatables.min.js"></script>

  <script>
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
  </script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url('vendor/dist/'); ?>assets/js/page/modules-datatables.js"></script>
  
  <!-- Template JS File -->
  <script src="<?= base_url('vendor/dist/'); ?>assets/js/scripts.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/js/custom.js"></script>

  <!-- Role Change -->
  <script>
  $('.form-check-input').on('click', function() {
      const menuId = $(this).data('menu');
      const roleId = $(this).data('role');

      $.ajax({
          url: "<?= base_url('admin/changeaccess'); ?>",
          type: 'post',
          data: {
              menuId: menuId,
              roleId: roleId
          },
          success: function() {
              document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
          }
      });

  });
  </script>

  <!-- Data Tables -->
  <script>
    $(document).ready( function () {
      $('#dataTables').DataTable({
       
      });
    } );
  </script>


    <!-- Custom Files Upload -->
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
     </script>

</body>
</html>