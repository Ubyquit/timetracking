<!-- Edit Modal-->
<form class="user" action="acciones/editar_permisos.php" method="post">
	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title" id="myModalLabel">Editar permiso</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Nombres del permiso</span>
						<input name="editar_permiso" type="text" style="width:350px;" class="form-control" id="efirstname" value="efirstname">
						<input name="id" id="id_rol" value="<?php echo $fila["id_rol"]?>" type="hidden"> 
					</div>				
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </i>Actualizar</button>
                </div>
            </div>
        </div>
	</div>
</form>
<!-- /.modal -->