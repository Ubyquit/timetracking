$(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
		var first=$('#nombrepermiso'+id).text();
	
		$('#edit').modal('show');
		$('#efirstname').val(first);
		$('#id_rol').val(id);
	});
});