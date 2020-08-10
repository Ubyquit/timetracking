$(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
		var first=$('#nombreestatus'+id).text();
	
		$('#edit').modal('show');
		$('#efirstname').val(first);
		$('#id_estatus').val(id);
	});
});