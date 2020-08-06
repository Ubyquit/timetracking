$(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
		var first=$('#nombretarea'+id).text();
	
		$('#edit').modal('show');
		$('#efirstname').val(first);
		$('#id_tarea').val(id);
	});
});