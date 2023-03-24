
<!-- sauvgarder les inputs de la formulaire dans un tableau -->
 <?php
 Include 'conn.php';
 $nom = $_POST['nom'];
 $composant = $_POST['composant'];
 $qte = $_POST['qte'];
 $insertion = $database->prepare("INSERT INTO compoetud (nom, composant, qte) VALUES (:nom, :composant, :qte)");
 $insertion->bindParam(':nom', $nom);
 $insertion->bindParam(':composant', $composant);
    $insertion->bindParam(':qte', $qte);
    $insertion->execute();
    header('Location: htmlTodocs.php');
 ?>