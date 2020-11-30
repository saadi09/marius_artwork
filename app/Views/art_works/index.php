<?= $this->extend('default_layout') ?>
<?= $this->section('content') ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Art Work Listing </h5>
                <div class="ibox-tools">
                    <a href="<?= site_url('create_artwork') ?>" class="btn btn-w-m btn-success btn-xs" id="customBTN">
                        Add New Work
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>S#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Art Type</th>
                <th>Author Name</th>
                <th>status</th>
                <th>Created At</th>
                <th style="width: 20%">Action</th>
            </tr>
            </thead>
            <tbody>
            
            </tbody>
            <tfoot>
            <tr>
                <th>S#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Art Type</th>
                <th>Author Name</th>
                <th>status</th>
                <th>Created At</th>
                <th style="width: 20%">Action</th>
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
    $(document).ready(function(){
        $('#datatable').DataTable({
          lengthMenu: [[ 10, 30, -1], [ 10, 30, "All"]], // page length options
          bProcessing: true,
          serverSide: true,
          scrollY: "400px",
          scrollCollapse: true,
          ajax: {
            url: '<?= site_url('get_all_artworks') ?>', // json datasource
            type: "post",
            data: {
              // key1: value1 - in case if we want send data with request
            }
          },
          columns: [
            { data: "id_artwork" , name: 'oa_art_works.id_artwork'},
            { data: "title" , name: 'oa_art_works.title'},
            { data: "description" , name: 'oa_art_works.title'},
            { data: "awt_title" , name: 'oa_art_work_types.awt_title'},
            { data: "name" , name: 'users.name'},
            { data: "status" , name: 'oa_art_works.status'},
            { data: "created_at" , name: 'oa_art_works.created_at'},
            { data: "action"},

        ],
        // columnDefs:[{targets:6, render:function(data){
        //      return moment(data).format('D MMMM YYYY');
        //    }}],
        //   columnDefs: [
        //     { orderable: false, targets: [0, 1, 2, 3] }
        // ],
        bFilter: true, // to display datatable search
        dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ]
        });

    });

    function deleteItems(id){
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "<?= site_url('menu_delete') ?>",
                data: { 'id': id},
                cache: false,
                success: function(response) {
                    location.reload();
                },
                failure: function (response) {
                    location.reload();
                }
            });
           
          } else if (
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'Cancelled',
              'Your imaginary file is safe :)',
              'error'
            )
          }
        })
    }

    function test(id){
      alert(id);
    }
</script>

<?= $this->endSection() ?>

