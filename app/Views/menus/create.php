<?= $this->extend('default_layout') ?>
<?= $this->section('content') ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">
                <h5>Add Menu Items</h5>
                <div class="ibox-tools">
                    <a href="<?= site_url('menu_manager') ?>" class="btn btn-w-m btn-success btn-xs"  id="customBTN">
                        Back
                    </a>
                </div>
            </div>
				<div class="ibox-content">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 b-r">
							<h3 class="m-t-none m-b">Add Menu</h3>
							<form id="addForm">
								<input type="hidden" name="{csrf_token}" value="{csrf_hash}">
								<div class="form-group">
									<label>Parent</label>
									<select class="form-control selectdemo" name="parent">
										<option value="0">Main</option>
										<?php for($i=0; $i<count($parents); $i++): ?>
										  <option value="<?= $parents[$i]['id'];?>"><?= $parents[$i]['name'];?></option>
										<?php endfor; ?>
									</select>
								</div>

								<div class="form-group">
									<label>Name</label>
									<input type="text" required name="name" placeholder="Name" class="form-control">
								</div>

								<div class="form-group">
									<label>Fonts</label>
									<select class="form-control selectdemo" style="width: 100%;" name="class" id="class">
										<option value="">Select Font Icon</option>
										<?php for($i=0; $i<count($fonts); $i++): ?>
											<option value="<?= $fonts[$i]['class'];?>"><?= $fonts[$i]['class'];?></option>
										<?php endfor; ?>
									</select>
								</div>

								<div class="form-group">
									<label>Order</label>
									<input type="number" name="order" placeholder="Order" class="form-control">
								</div>

								<div class="form-group">
									<label>Routes</label>
									<select class="form-control selectdemo" name="url" id="url">
										<option value="">Select Route</option>
										<?php for($i=0; $i<count($routes); $i++): ?>
											<option value="<?= $routes[$i]['route'];?>" ><?= $routes[$i]['label'];?> (<?= $routes[$i]['route'];?>)</option>
										<?php endfor; ?>
									</select>
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
            url: '<?= site_url('/menu_add') ?>',
            cache: false,
            type: 'POST',
            data: $('#addForm').serialize(),
            success: function (data){
                if(data == 'Success'){
                	toastr.success('Success','New Menu Has Been Created');
                } else{
                   toastr.Error('Error','Menu could not be created');
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



