<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Add School</h3>
  </div>
  <div class="panel-body">
  <div class="form-horizontal" id="school-form" action="">
  <div class="form-group">
    <label for="schoolName" class="col-sm-2 control-label">School Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="schoolName" placeholder="School Name">
	  <p id="schoolName_msg"></p>
    </div>
  </div>
  <div class="form-group">
    <label for="schoolLocation" class="col-sm-2 control-label">School Location</label>
    <div class="col-sm-10">
      <input type="textarea" class="form-control" id="schoolLocation" placeholder="School Location">
	  <p id="schoolLocation_msg"></p>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="add_school" class="btn btn-default">Add</button>
    </div>
  </div>
</div>
  </div>
</div>

<script>

	$('#add_school').on('click', function(){
		let school_name = $("#schoolName").val();
		let school_Location = $("#schoolLocation").val();
		console.log(school_name);
		let submit = true;
		if(!school_name){
			$("#schoolName_msg").text("School name is required.").addClass("alert-danger");
			submit = false;
		}

		if(!school_Location){
			$("#schoolLocation_msg").text("School location is required.").addClass("alert-danger");
			submit = false;
		}

		if(!submit){
			return;
		}

		$.ajax({
			url: "<?php echo base_url('schools/insertSchool'); ?>",
			data: {
				'school_name' : school_name,
				'school_location' : school_Location
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