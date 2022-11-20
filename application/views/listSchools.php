<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">List of Schools</h3>
	</div>
	<div class="panel-body">
		<?php if ($this->session->flashdata('success')) { ?>
			<div class="box-header">
				<div class="col-lg-6">
					<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
				</div>
			</div>

		<?php }

		echo $table;
		?>

	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script>
	$('button.delete_school').on('click', function() {
		let school_name = $(this).data("school_name");
		let school_Location = $(this).data("school_address");
		let school_id = $(this).val();
		$('<div></div>').appendTo('body')
			.html('<div><h6>' + "Are you sure to delete " + school_name+ ' from '+school_Location+' ?</h6></div>')
			.dialog({
				modal: true,
				title: 'Delete message',
				zIndex: 10000,
				autoOpen: true,
				width: 'auto',
				resizable: false,
				buttons: {
					Yes: function() {
						$.ajax({
							url: "<?php echo base_url('schools/deleteSchool'); ?>",
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
						});					

						$(this).dialog("close");
					},
					No: function() {
						$(this).dialog("close");
					}
				},
				close: function(event, ui) {
					$(this).remove();
				}
			});
	});

</script>