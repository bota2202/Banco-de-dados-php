<?php
    $mysqli = mysqli_connect('localhost', 'root', '@Plast..2024', 'livros');

    $columns = array('titulo', 'quantidade', 'genero', 'preco', 'id_autor');

    $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

    $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

    if ($result = $mysqli->query("SELECT * FROM livros ORDER BY $column $sort_order")) {

        $up_or_down = $sort_order == 'ASC' ? '▲' : '▼';
        $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
        ?>
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Livros</title>
            <style>
                table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                    padding: 8px;
                }
                th a {
                    text-decoration: none;
                    color: black;
                }
            </style>
        </head>
        <body>
            <table>
                <tr>
                    <th><a href="index.php?column=titulo&order=<?php echo $asc_or_desc; ?>">Título <?php echo $column == 'titulo' ? $up_or_down : ''; ?></a></th>
                    <th><a href="index.php?column=quantidade&order=<?php echo $asc_or_desc; ?>">Quantidade <?php echo $column == 'quantidade' ? $up_or_down : ''; ?></a></th>
                    <th><a href="index.php?column=genero&order=<?php echo $asc_or_desc; ?>">Gênero <?php echo $column == 'genero' ? $up_or_down : ''; ?></a></th>
                    <th><a href="index.php?column=preco&order=<?php echo $asc_or_desc; ?>">Preço <?php echo $column == 'preco' ? $up_or_down : ''; ?></a></th>
                    <th><a href="index.php?column=id_autor&order=<?php echo $asc_or_desc; ?>">Autor <?php echo $column == 'id_autor' ? $up_or_down : ''; ?></a></th>
                </tr>

                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['titulo']; ?></td>
                        <td><?php echo $row['quantidade']; ?></td>
                        <td><?php echo $row['genero']; ?></td>
                        <td><?php echo $row['preco']; ?></td>
                        <td><?php echo $row['id_autor']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </body>
        </html>
    <?php
    }
?>
