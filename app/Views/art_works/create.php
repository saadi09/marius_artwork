<?= $this->extend('default_layout') ?>
<?= $this->section('content') ?>
<style type="text/css">
	img{
		width: 100px !important;
	}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
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
						<div class="col-sm-7 offset-sm-3 b-r">
						<form id="save_artwork"  enctype="multipart/form-data" class="mb-3">
								<input type="hidden" name="{csrf_token}" value="{csrf_hash}">

								<div class="form-group">
									<label>Title</label>
									<input type="text" required name="title" placeholder="Title" class="form-control">
								</div>

								<div class="form-group">
									<label>Price</label>
									<input type="number" required name="price" placeholder="Price" class="form-control">
								</div>

								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" rows="3" cols="10" name="description"></textarea>
								</div>
								<div class="form-group">
									<label>Art Type</label>
									<select name="art_types" class="form-control">
										<?php foreach($type as $row): ?>
											<option value="<?= $row->id ?>"><?= $row->awt_title ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="form-group">
									<label>Upload Art work Images</label>
									<div class="custom-file">
									    <input type="file" name="fileUpload[]" class="custom-file-input" id="chooseFile" multiple>
									    <label class="custom-file-label" for="chooseFile">Select file</label>
									</div>
								</div>

								<div class="form-group">
									<div class="imgGallery">
									</div>
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

		$(function () {
		    // Multiple images preview with JavaScript
		    var multiImgPreview = function (input, imgPreviewPlaceholder) {

		      if (input.files) {
		        var filesAmount = input.files.length;

		        for (i = 0; i < filesAmount; i++) {
		          var reader = new FileReader();

		          reader.onload = function (event) {
		            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
		          }

		          reader.readAsDataURL(input.files[i]);
		        }
		      }

		    };

		    $('#chooseFile').on('change', function () {
		      multiImgPreview(this, 'div.imgGallery');
		    });
		  });

    	$("#save_artwork").on('submit', (function (e) {
            e.preventDefault();
            toastr.info("Your Request processing...")
            var fd = new FormData(this);
            $.ajax({
                url: '<?= site_url('store_artwork') ?>',
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



