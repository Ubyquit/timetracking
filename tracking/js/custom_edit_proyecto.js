$(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
		var first=$('#nombreproyecto'+id).text();
	
		$('#edit').modal('show');
		$('#efirstname').val(first);
		$('#id_proyecto').val(id);
	});
});