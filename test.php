<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Formation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        .formation-container {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="month"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        button[type="submit"] {
            background-color: #008CBA;
        }

        button[type="submit"]:hover {
            background-color: #0077A3;
        }

        .ajouter-formation-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<form id="formFormation" action="traitement.php" method="post">
    <div class="formation-container">
        <label for="titre">Titre:</label>
        <input type="text" name="titre[]">

        <label for="date_debut">Date de début:</label>
        <input type="month" name="date_debut[]">

        <label for="date_fin">Date de fin:</label>
        <input type="month" name="date_fin[]">

        <label>Aujourd'hui:
            <input type="radio" name="aujourdhui[]" value="1" onclick="toggleDateFin(this)">
        </label>

        <label for="description">Description:</label>
        <textarea name="description[]"></textarea>

        <button type="button" onclick="supprimerFormation(this)">Supprimer</button>
    </div>

    <button type="button" class="ajouter-formation-button" onclick="ajouterFormation()">Ajouter Formation</button>
    <input type="submit" value="Enregistrer">
</form>

<script>
    function toggleDateFin(radio) {
        var dateFinInput = radio.parentNode.parentNode.querySelector('[name="date_fin[]"]');
        dateFinInput.disabled = radio.checked;
        if (radio.checked) {
            dateFinInput.value = ""; // Réinitialise la valeur si aujourd'hui est sélectionné
        }
    }

    function ajouterFormation() {
        var formationContainer = document.querySelector('#formFormation .formation-container').cloneNode(true);
        formationContainer.querySelectorAll('input, textarea').forEach(function (element) {
            element.value = ""; // Réinitialise les valeurs
        });
        formationContainer.querySelector('[type="radio"]').addEventListener('click', function () {
            toggleDateFin(this);
        });

        formationContainer.querySelector('button').addEventListener('click', function () {
            supprimerFormation(this);
        });

        document.querySelector('#formFormation').appendChild(formationContainer);
    }

    function supprimerFormation(button) {
        var formationContainer = button.parentNode;
        if (document.querySelectorAll('.formation-container').length > 1) {
            formationContainer.parentNode.removeChild(formationContainer);
        } else {
            alert("Vous ne pouvez pas supprimer la seule formation.");
        }
    }
</script>

</body>
</html>
