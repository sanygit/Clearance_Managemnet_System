<script src="./dist/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="./dist/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

    <script src="./dist/js/actions.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="./dist/js/plugins/metisMenu/metisMenu.min.js"></script>
<!-- Custom Theme JavaScript -->
    <!--<script src="./dist/js/sb-admin-2.js"></script>-->

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- PHP brush scripts-->
<script src="./dist/js/shCore.js"></script>
<script src="./dist/js/shBrushPhp.js"></script>
<script type="text/javascript">
    SyntaxHighlighter.all();
    jQuery(".sidebar-menu li a").each(function ($) {
        var path = window.location.href;

        var current = path.substring(path.lastIndexOf('/') + 1);
        var url = jQuery(this).attr('href');
        if (url == current) {
            jQuery(this).parent().addClass("active");
            jQuery(this).parents("ul").css({"display": "block"});
        }
    });

</script>
