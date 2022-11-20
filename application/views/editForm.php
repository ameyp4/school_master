<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Edit School</h3>
  </div>
  <div class="panel-body">
  <div class="form-horizontal" id="school-form" action="">
  <div class="form-group">
    <label for="edit_schoolName" class="col-sm-2 control-label">School Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="edit_schoolName" value="<?php echo $response['school_name']; ?>" placeholder="School Name">
	  <p id="edit_schoolName_msg"></p>
    </div>
  </div>
  <div class="form-group">
    <label for="edit_schoolLocation" class="col-sm-2 control-label">School Location</label>
    <div class="col-sm-10">
      <input type="textarea" class="form-control" id="edit_schoolLocation" value="<?php echo $response['school_address']; ?>" placeholder="School Location">
	  <p id="edit_schoolLocation_msg"></p>
    </div>
  </div>
  <input type="hidden" class="form-control" id="edit_schoolID" value="<?php echo $response['id']; ?>">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="edit_school" class="btn btn-default">Edit</button>
    </div>
  </div>
</div>
  </div>
</div>

<script>

	$('#edit_school').on('click', function(){
		let school_name = $("#edit_schoolName").val();
		let school_Location = $("#edit_schoolLocation").val();
		let school_id = $("#edit_schoolID").val();
		let submit = true;
		if(!school_name){
			$("#edit_schoolName_msg").text("School name is required.").addClass("alert-danger");
			submit = false;
		}

		if(!school_Location){
			$("#edit_schoolLocation_msg").text("School location is required.").addClass("alert-danger");
			submit = false;
		}

		if(!submit){
			return;
		}

		$.ajax({
			url: "<?php echo base_url('schools/editSchool'); ?>",
			data: {
				'school_name' : school_name,
				'school_location' : school_Location,
				'school_id' : school_id
			},
			type : "POST",
			dataType: 'JSON',
			success: function(result){
				if(result.status == 'success'){
					window.location.href = '<?php echo base_url('/schools'); ?>'
				}
				if(result.status == 'error'){
					alert(result.msg);
				}
			},
			error: function(){
				alert("Something Went Wrong.");
			}
		})

	});

</script>