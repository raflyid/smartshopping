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
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/popper.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/tooltip.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/moment.min.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  $(function () {
    $('[data-toggle="popover"]').popover()
  })

  <!-- Page Specific JS File -->
  
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

</body>
</html>