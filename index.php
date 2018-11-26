<?php 
	
include_once "model/Conexao.class.php";
include_once "model/Manager.class.php";

$manager = new Manager();

?>

<!DOCTYPE html>
<html>
<head>
	<?php include_once 'view/dependencias.php'; ?>
</head>
<body>

	<div class="container">

		<h2 class="text-center">
			List of Clients <i class="fa fa-list"></i>
		</h2>

		<h5 class="text-right">
			<a href="view/page_register.php" class="btn btn-primary">
				<i class="fa fa-user-plus"></i>
			</a>
		</h5>

		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>NOME</th>
						<th>EMAIL</th>
						<th>CPF</th>
						<th>DT.NASCIMENTO</th>
						<th>ENDEREÇO</th>
						<th>TELEFONE</th>
						<th colspan="3">AÇÕES</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($manager->listClient("registros") as $value): ?>
					<tr>
						<td><?= $value['id']?></td>
						<td><?= $value['name']?></td>
						<td><?= $value['email']?></td>
						<td><?= $value['cpf']?></td>
						<td><?= date('d/m/Y', strtotime($value['birth']))?></td>
						<td><?= $value['address']?></td>
						<td><?= $value['phone']?></td>
						<td>
							<form method="POST" action="view/page_update.php">

								<input type="hidden" name="id" value="<?=$value['id']?>">

								<button class="btn btn-warning">
									<i class="fa fa-user-edit"></i>
								</button>
							</form>
						</td>
						<td>
							<form method="POST" action="controller/delete_client.php" onclick="return confirm('Você tem certeza que deseja excluir?')">

								<input type="hidden" name="id" value="<?=$value['id']?>">

								<button class="btn btn-danger">
									<i class="fa fa-trash"></i>
								</button>
							</form>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>

</body>
</html>