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
