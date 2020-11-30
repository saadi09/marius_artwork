<?= $this->extend('default_layout') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" />
<style type="text/css">
	img{
		width: 100px !important;
	}

	

</style>
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">
                <h5>Add Your Art Work</h5>
                <div class="ibox-tools">
                    <a href="<?= site_url('list_artwork') ?>" class="btn btn-w-m btn-success btn-xs" id="customBTN">
                        Art Work List
                    </a>
                </div>
            </div>
				<div class="ibox-content">
					<div class="row">
						<div class="col-sm-4">
						<form id="save_artwork" enctype="multipart/form-data" class="mb-3">
								<input type="hidden" name="{csrf_token}" value="{csrf_hash}">
								<input type="hidden" name="id" value="<?= $data[0]->id_artwork ?>">
								<input type="hidden" name="email" value="<?= $data[0]->email ?>">
								<input type="hidden" name="user_name" value="<?= $data[0]->name ?>">

								<div class="form-group">
									<label>Title</label>
									<input type="text" required name="title" value="<?= $data[0]->title ?>" readonly placeholder="Title" class="form-control">
								</div>

								<div class="form-group">
									<label>Price</label>
									<input type="number" required name="price" placeholder="Price" readonly value="<?= $data[0]->price ?>" class="form-control">
								</div>

								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" rows="3" cols="10" readonly name="description"><?= $data[0]->description ?></textarea>
								</div>
								<div class="form-group">
									<label>Art Type</label>
									<input type="text" required name="type" placeholder="Tyoe" readonly value="<?= $data[0]->awt_title ?>" class="form-control">
								</div>
								<div class="form-group">
									<label>Status</label>
									<select name="status" class="form-control">
										<option <?= $data[0]->status == 'Pending' ?  'selected' : '' ?> value="Pending">Pending</option>
										<option <?= $data[0]->status == 'Approved' ?  'selected' : '' ?> value="Approved">Approved</option>
										<option <?= $data[0]->status == 'Disapproved' ?  'selected' : '' ?> value="Disapproved">Disapproved</option>
										<option <?= $data[0]->status == 'Cancelled' ?  'selected' : '' ?> value="Cancelled">Cancelled</option>
										<option <?= $data[0]->status == 'Deleted' ?  'selected' : '' ?> value="Deleted">Deleted</option>
									</select>
								</div>

								<div>
									<button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Update</strong>
									</button>
								</div>

							</form>
						</div>
						
						<div class="col-sm-8">
							<div class="row">
				                <div class="col-lg-12">
				                	<div class="box">
				                        <h3>Art work image gallery</h3>
			                            <div class="row">
			                            <?php $i=1; foreach($images  as $row): ?>
			                            <div class="col-xs-3">
			                            	<img class="img" style="cursor: pointer;width: 150px !important;height:150px !important;padding: 5px;border-style: solid;" id="<?= $i ?>"  src="<?= str_replace("public","writable",base_url()).'/uploads/'.$row['image'] ?>" />
			                            </div>	
			                            <?php $i++; endforeach; ?>
			                            </div>
		                        	</div>
				            	</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="overlay"></div>
<script src="<?= base_url('js/jquery-3.1.1.min.js') ?>"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#save_artwork").on('submit', (function (e) {
            e.preventDefault();
            toastr.info("Your Request processing...")
            var fd = new FormData(this);
            $.ajax({
                url: '<?= site_url('update_artwork') ?>',
                data: fd,
                type: "POST",
                contentType: false,
                processData: false,
                cache: false,
                success: function (res) {
                    var res = $.parseJSON(res);
                    if (res == 'Success') {
                        toastr.success('Update successfully');
                        setTimeout(function(){
                            location.reload();
                        }, 1000);

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
	
</script>
<?= $this->endSection() ?>



