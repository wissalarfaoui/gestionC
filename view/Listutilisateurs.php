<?php
include '../Controller/utilisateursC.php';
$utilisateursC = new utilisateursC();
$list = $utilisateursC->listutilisateurs();
?>
<html>

<head>
    
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <center>
        <h1>List of utilisateurss</h1>
        <h2>
            <a href="addutilisateurs.php">Add utilisateurs</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
           <!--  <th>Id utilisateurs</th> --> 
            <th>pseudo</th>
            <th>email</th>
           
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $utilisateurs) {
        ?>
            <tr>
             <!--    <td><?= $utilisateurs['id']; ?></td>--> 
                <td><?= $utilisateurs['pseudo']; ?></td>
                <td><?= $utilisateurs['email']; ?></td>
               
                <td align="center">
                    <form method="POST" action="updateutilisateurs.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $utilisateurs['id']; ?> name="id">
                    </form>
                </td>
                <td>
                    <a href="deleteutilisateurs.php?id=<?php echo $utilisateurs['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>