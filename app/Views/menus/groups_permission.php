<?= $this->extend('default_layout') ?>
<?= $this->section('content') ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Groups & Permission </h5>
                <div class="ibox-tools">
                    <a href="<?= site_url('add_groups') ?>" class="btn btn-w-m btn-success btn-xs"  id="customBTN">
                        Add New
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>S#</th>
                <th>Group Name</th>
                <th>Created At</th>
                <th style="width: 15%">Permission</th>
                <th style="width: 15%">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=0; foreach($data as $row): ?>    
            <tr class="gradeX">
                <td><?= $i++ ?></td>
                <td><?= $row['type'] ?></td>
                <td><?= strtotime("m-d-Y",$row['created_at']) ?></td>
                <td>
                    <a href="<?= site_url('user_group_permission').'/'.$row['id'] ?>" class="btn  btn-info btn-xs"><i class="fa fa-gears"></i> Permission</a>
                </td>
                <td>
                    <a href="<?= site_url('menu_edit').'/'.$row['id'] ?>" class="btn  btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="#" onclick="deleteMenuItems('<?= $row['id'] ?>');" class="btn  btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <th>S#</th>
                <th>Group Name</th>
                <th>Created At</th>
                <th style="width: 15%">Permission</th>
                <th style="width: 15%">Action</th>
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
        $('.dataTables-example').DataTable({
            pageLength: 10,
            responsive: true,
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

    function deleteMenuItems(id){
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
</script>

<?= $this->endSection() ?>

