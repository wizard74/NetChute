<?php
$msg = "";

try {
	if (isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['email'])) {
		include_once './conexao.php';

		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$email = $_POST['email'];
		$id = $_POST['id'];

		$sql = "INSERT INTO clientes (nome, cpf, email) VALUES ('$nome', '$cpf', '$email');";
		if (mysqli_query($conn, $sql)) {
			$msg = "Cadastrado com sucesso!";
		} else {
			$msg = "ERRO ao cadastrar: $sql <br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
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
					<form name="frm" id="frm" action="index.php" method="post">
						<div class="row row">
							<div class="col col-sm-12">
								<label class="form-label">Nome do cliente: </label>
								<input type="text" id="nome" name="nome" class="form-control" value="" autofocus>

							</div>
						</div>
						<div class="row row g-2">
							<div class="col col-sm">
								<label class="form-label">CPF: </label>
								<input type="text" id="cpf" name="cpf" class="form-control" value="">
								<small class="form-text text-muted"><em>Somente números.</em></small>
							</div>
							<div class="col col-sm-8">
								<label class="form-label">E-mail: </label>
								<input type="email" id="email" name="email" class="form-control" value="">
								<small id="emailHelp" class="form-text text-muted"><em>email@email.com</em></small>
							</div>
						</div>
						<br>
						<button type="submit" class="btn btn-primary">Cadastrar</button>
						<br><br>
						<?="<div>$msg</div>";?>
					</form>
				</div>
			</div>

<?php
include_once './rodape.php';
?>