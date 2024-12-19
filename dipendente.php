<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabella Dipendenti</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <?php 
    require('DBCLASSES/SchedaFunctions.php');
    require_once('DBCLASSES/Config.php');
    $dip=new SchedaFuncs($pdo);
    $codice=$_POST['codice'] ?? '';
    $rows=$dip->selectScheda($codice);
    ?>
    <h1>Tabella Dipendenti</h1>
    <form action="dipendente.php" method="POST">
        <input type="text" placeholder="inserisci codice" name="codice">
        <input type="submit" value="carica scheda">
    </form>
    <table>
        <thead>
            <tr>
                <th>Orario Entrata</th>
                <th>Orario Uscita</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($rows as $row)
            {
            ?>
            <tr>
                <td><?=$row['orario_entrata']?></td>
                <td><?=$row['orario_uscita']?></td>
                <td><?=$row['note']?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</body>
</html>
