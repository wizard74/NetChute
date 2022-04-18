<?php
    include_once './conexao.php';
    $sql = "SELECT * FROM clientes;";
    $result = $conn->query($sql);
    
    include_once './cabecalho.php';
?>

        <div class="container">
            <div class="card w-75 p-3 rounded">
                <div class="card-header">
                    <h5 class="card-title">Clientes cadastrados:</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-responsive w-100 table-striped">

                        <thead>
                            <tr>
                                <th scope="col">Código:</th>
                                <th scope="col">Nome:</th>
                                <th scope="col">CPF:</th>
                                <th scope="col">E-mail:</th>
                                <th scope="col">Ação:</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '  <td>';
                                        echo '    <span>' . $row["codigo"] . '</span>';
                                        echo '  </td>';

                                        echo '  <td>';
                                        echo '    <span>' . $row["nome"] . '</span>';
                                        echo '  </td>';

                                        echo '  <td>';
                                        echo '    <span>' . $row["cpf"] . '</span>';
                                        echo '  </td>';
                                        
                                        echo '  <td>';
                                        echo '    <span>' . $row["email"] . '</span>';
                                        echo '  </td>';

                                        echo '  <td>';
                                        echo '    <span><a href="alterar.php?codigo=' . $row["codigo"] . '" class="btn btn-info">Editar</a> <a href="deletar.php?codigo=' . $row["codigo"] . '" class="btn btn-danger">Excluir</a></span>';
                                        echo '  </td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo "Não existem dados cadastrados.";
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
<?php
include_once './rodape.php';
?>