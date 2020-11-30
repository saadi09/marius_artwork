<?= $this->extend('default_layout') ?>
<?= $this->section('content') ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">
                <h5>Add Groups</h5>
                <div class="ibox-tools">
                    <a href="<?= site_url('add_permission') ?>" class="btn btn-w-m btn-success btn-xs" id="customBTN">
                        Group List
                    </a>
                </div>
            </div>
				<div class="ibox-content">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 b-r">
							<h3 class="m-t-none m-b">Add Menu Route</h3>
							<form id="addForm">
								<input type="hidden" name="{csrf_token}" value="{csrf_hash}">

								<div class="form-group">
									<label>Group Name</label>
									<input type="text" required name="name" placeholder="Group Name" class="form-control">
								</div>


								<div>
									<button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Save</strong>
									</button>
									
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?= base_url('js/jquery-3.1.1.min.js') ?>"></script>
<script type="text/javascript">
	$(function () {

		$(document).on('submit', '#addForm', function(){
        $.ajax({
            url: '<?= site_url('store_groups') ?>',
            cache: false,
            type: 'POST',
            data: $('#addForm').serialize(),
            success: function (data){
                if(data == 'Success'){
                	toastr.success('Success','New Menu  Route Has Been Created');
                } else{
                   toastr.Error('Error','Menu route could not be created');
                }
            },
            error: function(data){
                var errors = data.responseJSON;
                var message = "";
                $.each(errors, function(index, value){
                    message += value+"<br>";
                });
                toastr.Error(message, 'error', 'right');
            }
        });
        return false;
    });

	});
</script>
<?= $this->endSection() ?>



