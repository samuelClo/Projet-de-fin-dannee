

<main>
    <div id="containAll">
        <div id="containSelect">
            <h3>Choisissez le sujet de votre formulaire : </h3>
            <select id="contactSectors">
                <option>Veuilliez choisir un secteur</option>
                <?php foreach ($allSectors as $sectorName): ?>
                    <option value= <?= $sectorName['id'] ?>> <?= $sectorName['name'] ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div id="containMessage">
            <div id="titleMessage" class="bcgGreen">Dégradations</div>
            <div id="messageContent">
                <label for="mailContact">Adresse mail :</label>
                <input type="email" id="mailContact" name="mailContact" placeholder="johnDoe@mail.com"
                       value="<?php if (isset($_SESSION['user'])) echo $_SESSION['user']['email'] ?>">

                <textarea id="content" name="content" placeholder="Votre message : ">
                </textarea>
                <button class="btn bcgGreen">Envoyer</button>
            </div>
        </div>
    </div>
</main>

<?php



if (isset($_GET['modifyinfo'])) :?>
    <script>
        document.querySelector('#contactSectors option[value="5"]').selected = true;
        input = document.createElement("input")
        input.setAttribute("type", "text")
        input.setAttribute("placeholder", "votre sujet :")
        containSelect.insertBefore(input, document.querySelector("#contactSectors").nextSibling)
        document.querySelector("#containSelect input").value="Demande de modification d'information de profil"

        let titleMessage = document.querySelector("#titleMessage")
        let textOption = document.querySelector(`#containSelect input`).value
        titleMessage.innerText = textOption
        document.querySelector("#containMessage").style.visibility = "visible"
        document.querySelector("#containMessage").style.display = "block"
        document.querySelector("#containMessage").style.width = "50%"
        document.querySelectorAll("#containSelect select").forEach(function (element) {
            element.style.width = "80%"
        })
        stateValue = 2
    </script>
<?php endif;?>


