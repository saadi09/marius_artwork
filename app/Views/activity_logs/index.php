<?= $this->extend('default_layout') ?>
<?= $this->section('content') ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>User Activity Logs </h5>
                <div class="ibox-tools">
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>User</th>
                <th>Controller</th>
                <th>Method</th>
                <th>Date Time</th>
                <!-- <th style="width: 15%">Action</th> -->
            </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            <tr>
                <th>User</th>
                <th>Controller</th>
                <th>Method</th>
                <th>Date Time</th>
                <!-- <th>Action</th> -->
            </tr>
            </tfoot>
            </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>
<script src="<?= base_url('js/jquery-3.1.1.min.js') ?>"></script>

<script>
    // $(document).ready(function(){
    //     $('.dataTables-example').DataTable({
    //         pageLength: 10,
    //         responsive: true,
    //         dom: '<"html5buttons"B>lTfgitp',
    //         buttons: [
    //             { extend: 'copy'},
    //             {extend: 'csv'},
    //             {extend: 'excel', title: 'ExampleFile'},
    //             {extend: 'pdf', title: 'ExampleFile'},

    //             {extend: 'print',
    //              customize: function (win){
    //                     $(win.document.body).addClass('white-bg');
    //                     $(win.document.body).css('font-size', '10px');

    //                     $(win.document.body).find('table')
    //                             .addClass('compact')
    //                             .css('font-size', 'inherit');
    //             }
    //             }
    //         ]
    //     });

    // });

   
</script>

<script>
// $(function() {
//     if ($("#datatable").length > 0) {

//         $("#datatable").DataTable({
//             "processing": true,
//             "serverSide": true,
//             "ajax": "<?php echo site_url('get_ajax_activity_logs') ?>",
//             dom: 'Bfrtip',
//             buttons: [{
//                     extend: "copy",
//                     exportOptions: {
//                         columns: []
//                     }
//                 },
//                 {
//                     extend: "excel",
//                     title: "client_side_data"
//                 },
//                 {
//                     extend: "csv",
//                     title: "client_side_table_data"
//                 },
//                 {
//                     extend: "pdf",
//                     exportOptions: {
//                         columns: ":visible"
//                     }
//                 },
//                 'print'
//             ]
//         });
//     }
// });
</script>

<script>
    var site_url = "<?php echo site_url('get_ajax_activity_logs'); ?>";
    $(document).ready( function () {

        $('#datatable').DataTable({
          lengthMenu: [[ 10, 30, -1], [ 10, 30, "All"]], // page length options
          bProcessing: true,
          serverSide: true,
          scrollY: "400px",
          scrollCollapse: true,
          ajax: {
            url: '<?= site_url('get_ajax_activity_logs') ?>', // json datasource
            type: "post",
            data: {
              // key1: value1 - in case if we want send data with request
            }
          },
          columns: [
            { data: "user_id" },
            { data: "action_controller" },
            { data: "action_method" },
            { data: "date_time" }
            //{ data: "date_time" }
          ],
          columnDefs: [
            { orderable: false, targets: [0, 1, 2, 3] }
          ],
          bFilter: true, // to display datatable search
        });
    });
  </script>

<?= $this->endSection() ?>

