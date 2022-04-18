<?php
$msg = "";

try {
	if (isset($_GET['codigo'])) {
		include_once './conexao.php';

		$codigo = $_GET['codigo'];
		$codigo = (int) $codigo;

		$sql = "DELETE FROM clientes WHERE codigo=$codigo;";
		if (mysqli_query($conn, $sql)) {
			$msg = "Dados do código: $codigo - deletados!";
		} else {
			$msg = "ERRO ao deletar: $sql <br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
	} else {
		header('Location: ./index.php');
	}
} catch (Exception $e) {
	die('ERRO: ' .  $e->getMessage() . "\n");
}

include_once './cabecalho.php';
?>

		<div class="container">
			<div class="card w-75 p-3 rounded">
				<div class="card-header">
					<h5 class="card-title"><?=$msg;?></h5>
				</div>
				<div class="card-body"></div>
			</div>

<?php
include_once './rodape.php';
?>