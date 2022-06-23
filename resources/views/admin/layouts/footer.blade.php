<footer class="main-footer">
    {{-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div> --}}
</footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('assets/admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('assets/admin') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
{{-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> --}}
<!-- Bootstrap 4 -->
<script src="{{ url('assets/admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ url('assets/admin') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
{{-- <script src="{{ url('assets/admin') }}/plugins/sparklines/sparkline.js"></script> --}}
<!-- JQVMap -->
{{-- <script src="{{ url('assets/admin') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ url('assets/admin') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> --}}
<!-- jQuery Knob Chart -->
{{-- <script src="{{ url('assets/admin') }}/plugins/jquery-knob/jquery.knob.min.js"></script> --}}
<!-- daterangepicker -->
{{-- <script src="{{ url('assets/admin') }}/plugins/moment/moment.min.js"></script> --}}
<script src="{{ url('assets/admin') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
{{-- <script src="{{ url('assets/admin') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> --}}
<!-- Summernote -->
{{-- <script src="{{ url('assets/admin') }}/plugins/summernote/summernote-bs4.min.js"></script> --}}
<!-- overlayScrollbars -->
<script src="{{ url('assets/admin') }}/dist/js/pages/dashboard3.js"></script>

<script src="{{ url('assets/admin') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('assets/admin') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('assets/admin') }}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('assets/admin') }}/dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ url('assets/admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('assets/admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('assets/admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('assets/admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('assets/admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('assets/admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
{{-- <script src="{{ url('assets/admin') }}/plugins/jszip/jszip.min.js"></script> --}}
{{-- <script src="{{ url('assets/admin') }}/plugins/pdfmake/pdfmake.min.js"></script> --}}
{{-- <script src="{{ url('assets/admin') }}/plugins/pdfmake/vfs_fonts.js"></script> --}}
<script src="{{ url('assets/admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('assets/admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ url('assets/admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="{{ url('js/preview_img.js') }}"></script>
<script src="{{ url('js/chart.js') }}"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="{{ url('js/order.js') }}"></script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          @php
            foreach($all_category as $category_value){
                echo "['".$category_value->name."',".count($category_value->products)."],";             
            }
          @endphp
        ]);

        var options = {
          title: 'Thống kê sản phẩm theo danh mục',
          pieHole: 0.3,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
</script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
@yield('src')
<script>
  // Replace the <textarea id="editor1"> with a CKEditor 4
  // instance, using default configuration.
  CKEDITOR.replace( 'editor1' );
</script>

<style>
  .hop_mau{
    width: 25px;
    height: 25px;
  }
</style>

</body>
</html>
