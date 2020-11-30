<?= $this->extend('default_layout') ?>
<?= $this->section('content') ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox >
            <div class="ibox-title">
                <h5>Groups & Permission </h5>
                <div class="ibox-tools">
                    <a href="<?= site_url('add_permission') ?>" class="btn btn-w-m btn-success btn-xs"  id="customBTN">
                        Back
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <input type="hidden" name="group_id" value="<?= $group_id ?>">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="parent_menu" >
                            <thead>
                                <tr>
                                    <th>Parent Menus</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($parents as $row): ?>    
                                <tr>
                                    <td style="cursor: pointer;color: blue;font-weight: bold;" class="parent_id" id="parent_id<?= $row['id'] ?>" data-mid="<?= $row['id'] ?>"><?= $row['name'] ?></td>
                                </tr>
                            <?php endforeach; ?>    
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div class="table-responsive">
                            <form id="save_permission" method="POST">
                                <table id="child_menu" class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Parent ID</th>
                                            <th>Child Menu</th>
                                            <th>Permission</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tb1">
                                       
                                    </tbody>
                                    
                                </table>
                            </form>
                        </div>
                    </div>
                </div>       
            </div>
        </div>
    </div>
    </div>
</div>
<script src="<?= base_url('js/jquery-3.1.1.min.js') ?>"></script>
<script>
    $(document).ready(function(){
       
       $('body').on('click', '.parent_id', function () {
            var id = $(this).data('mid');
            $.ajax({
                url: '<?= site_url('get_child_menu') ?>',
                type: 'POST',
                data: {id: id, group_id: <?= $group_id ?> },
                success: function (data) {
                    var res = data;
                    $('#tb1').html(res);
                }

            })
       });

       $("#save_permission").on('submit', (function (e) {
            e.preventDefault();
            toastr.info("Your Request processing...")
            var fd = new FormData(this);
            $.ajax({
                url: '<?= site_url('storePermission') ?>',
                data: fd,
                type: "POST",
                contentType: false,
                processData: false,
                cache: false,
                success: function (res) {
                    var res = $.parseJSON(res);
                    if (res == 'Success') {
                        toastr.success('Save successfully');
                        setTimeout(function(){
                            location.reload();
                        }, 2000);

                    } else {
                        $("#msg").html(res);
                        var temp = res.message.split("<p>");
                        $.each(temp, function (index, value) {
                            toastr.error(value);
                        });
                    }
                },
                error: function (xhr) {
                    $("#msg").html("Error: - " + xhr.status + " " + xhr.statusText);
                }
            });
        }));


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

