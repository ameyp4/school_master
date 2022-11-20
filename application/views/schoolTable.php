
<table id="schoolTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>School Name</th>
            <th>School Location</th>
			<th>Actions</th>
        </tr>
    </thead>
    <tbody>
		
		<?php 
		
		foreach($schools as $school){ ?>
		<tr>
            <td><?php echo $school['id']; ?></td>
            <td><?php echo $school['school_name']; ?></td>
            <td><?php echo $school['school_address']; ?></td>
			<td>
				<a href="<?php echo base_url('/schools/edit');?>/<?php echo $school['id']; ?>" class="btn btn-default btn-lg">
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
		</a>
				<button  data-school_name="<?php echo $school['school_name']; ?>" data-school_address="<?php echo $school['school_address']; ?>" value = "<?php echo $school['id']; ?>" class="delete_school btn btn-default btn-lg">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
		</a>
			</td>
        </tr>
		<?php } ?>
        
    </tbody>
</table>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
	$(document).ready(function () {
    $('#schoolTable').DataTable({
		"lengthChange": false,
		"pageLength": 20
	});
});
</script>