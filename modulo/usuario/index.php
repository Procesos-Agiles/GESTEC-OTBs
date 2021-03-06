<?php
	session_start();
	
	$path = "../../";
	include_once("../../class/library.class.php");
	include_once("../../class/setting.class.php");
	$lib = new Library($path);
	$setting = new Setting();
	include_once("../../class/sesion.class.php");
	
	$sesion = Sesion::getInstance();

	if($sesion->iniciado() == 0) {
		header('location: ' . $path . 'index.php');
	}

	$idUsuario = $sesion->obtener('idUsuario');
	$nombreModulo = 'Usuario';

	$dirModulos = $lib->getDirectory('dir_module');
	$dirUpload  = $lib->getDirectory('dir_upload');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $setting->getTitle(); ?></title>

    <!-- Bootstrap -->
    <link rel="icon" href="../../gotb2.png">

    <link rel="stylesheet" href="<?php echo $lib->getCSS("css_bootstrap1"); ?>">
    <link rel="stylesheet" href="<?php echo $lib->getCSS("css_bootstrap2"); ?>">
 	<link rel="stylesheet" href="<?php echo $lib->getCSS("css_dataTable1"); ?>">
    <link rel="stylesheet" href="<?php echo $lib->getCSS("css_dataTable2"); ?>">
    <link rel="stylesheet" href="<?php echo $lib->getCSS("css_style"); ?>">

    <script src="<?php echo $lib->getJS("lib_jquery"); ?>" type="text/javascript"></script>
    <script src="<?php echo $lib->getJS("lib_bootstrap"); ?>" type="text/javascript"></script>
    <script src="<?php echo $lib->getJS("lib_dataTables1"); ?>" type="text/javascript"></script>
    <script src="<?php echo $lib->getJS("lib_dataTables2"); ?>" type="text/javascript"></script>
    <script src="<?php echo $lib->getJS("lib_dataTables3"); ?>" type="text/javascript"></script>
	<script src="<?php echo $lib->getJS("lib_jscript"); ?>" type="text/javascript"></script>

</head>
<body>

<header id="header">
	<?php
    	include_once("../../system/header.php");
	?>
</header>


<nav class="navbar navbar-inverse">
     <?php

        $idRol    = $sesion->obtener('idRol');
		$nameUser = $sesion->obtener("nombreUsuario");
		$nameRol  = $sesion->obtener('nombreRol');
		include_once("../../system/menu.php");
    ?>
</nav><!--/nav-->


<div class="container-fluid contenedor">
	<div class="row">
    	<div class="col-xs-8 contenido" id="central">


            <a href="newrol.php" class="btn btn-primary" id="btnNew">Nuevo</a>
            <center>

            <caption> <h1>Gesti&oacute;n de Usuarios</h1></caption>
            <table id="gridx" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Tipo Usuario</th>
                        <th>CI</th>
                        <th>Nombre</th>
                        <td>Sexo</td>
                        <th>Foto</th>
                        <th>Estado</th>
                        <th>Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sqlUser = $db->executeQuerySQL("select * from usuario where vch_usuatipousuario <> 'otb'");

                        while($row=$db->query_Fetch_Array($sqlUser))
                        {
                    ?>
                    <tr>
                        <td><?php echo $row[vch_usuatipousuario]; ?></td>
                        <td><?php echo $row[vch_usuaci]; ?></td>
                        <td><?php echo $row[vch_usuanombre]." ".$row[vch_usuaapp]." ".$row[vch_usuaapm]; ?></td>
                        <td>
                        <center>
<<<<<<< HEAD
						<?php 							
=======
						<?php 
>>>>>>> origin/master
							if($row[vch_usuasexo]=="F")
							{
								echo '<img src="../../img/femenino.png" width="20px" class="img-rounded">';
							}else{
								echo '<img src="../../img/masculino.png" width="25px" class="img-rounded">';
							}							
						?>
                        </center>
                        </td>
                        <td><center><img src="<?php echo $row[vch_usuafoto]; ?>" width="30px"></center></td>
                        <td><center><?php if ($row[vch_usuaestado] == 'A') { echo "Activo"; } if ($row[vch_usuaestado] == 'I') { echo "Inactivo"; } ?></center></td>
                        <td>
                            <center>
                            <div class="btn-group btn-group-xs">
                              <a href="updaterol.php?id=<?php echo $row[pk_usuario]; ?>" class="btn btn-warning" id="btnUpdate">Actualizar</a>
                              <a href="delete.php?id=<?php echo $row[pk_usuario]; ?>&est=<?php $accion = ''; if ($row['vch_usuaestado'] == 'A') { $accion = 'Baja'; echo '0'; } else { $accion = 'Alta'; echo '1'; } ?>" class="btn btn-info" id="btnUpdate"><?php echo $accion; ?></a>
                            </div>
                            </div>
                            </center>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            </center>

        </div>
        <div class="col-xs-4 sidebar" id="noticia">
      		<?php include_once("../../system/side.php"); ?>
        </div>
	</div>
</div>


<footer id="footer" class="panel-footer">
    <?php include_once("../../system/footer.php"); ?>
</footer><!--/#footer-->

</body>
</html>
