<?php
$msg = "";

try {
	if (isset($_GET['codigo'])) {
		include_once './conexao.php';

		$codigo = (int) $_GET['codigo'];
		$sql = "SELECT * FROM clientes WHERE codigo=$codigo;";
    	$result = $conn->query($sql);
		mysqli_close($conn);

		$nome = "";
		$cpf = "";
		$email = "";

		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			$nome = $row["nome"];
			$cpf = $row["cpf"];
			$email = $row["email"];
		}
	} else if (isset($_POST['codigo'])) {
		include_once './conexao.php';

		$codigo = (int) $_POST['codigo'];
		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$email = $_POST['email'];
		$sql = "UPDATE clientes SET nome='$nome', cpf='$cpf', email='$email' WHERE codigo=$codigo;";
		if (mysqli_query($conn, $sql)) {
			$msg = "Dados do código: $codigo alterados com sucesso!";
		} else {
			$msg = "ERRO ao editar: $sql <br>" . mysqli_error($conn);
		}
		
		mysqli_close($conn);
	} else {
		header("Location: ./index.php");
	}
} catch (Exception $e) {
	die('ERRO: ' .  $e->getMessage() . "\n");
}

include_once './cabecalho.php';
?>

		<div class="container">
			<div class="card w-75 p-3 rounded">
				<div class="card-header">
					<h5 class="card-title">Dados do cliente:</h5>
				</div>
				<div class="card-body">
					<form name="frm" id="frm" action="alterar.php" method="post">
						<div class="row row g-2">
							<div class="col col-sm">
								<label class="form-label">Código: </label>
								<input type="text" id="codigo" name="codigo" class="form-control" value="<?=$codigo;?>" readonly>
							</div>
							<div class="col col-sm-10">
								<label class="form-label">Nome do cliente: </label>
								<input type="text" id="nome" name="nome" class="form-control" value="<?=$nome;?>" autofocus>
							</div>
						</div>
						<div class="row row g-2">
							<div class="col col-sm">
								<label class="form-label">CPF: </label>
								<input type="text" id="cpf" name="cpf" class="form-control" value="<?=$cpf;?>">
								<small class="form-text text-muted"><em>Somente números.</em></small>
							</div>
							<div class="col col-sm-8">
								<label class="form-label">E-mail: </label>
								<input type="email" id="email" name="email" class="form-control" value="<?=$email;?>">
								<small id="emailHelp" class="form-text text-muted"><em>email@email.com</em></small>
							</div>
						</div>
						<br>
						<button type="submit" class="btn btn-primary">Alterar</button>
						<br><br>
						<?="<div>$msg</div>";?>
					</form>
				</div>
			</div>

<?php
include_once './rodape.php';
?>