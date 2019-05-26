<main>

    <div id="containAll">
        <div id="containSelect">
            <h4>Choisissez le sujet de votre formulaire : </h4>
            <select id="contactSectors">
                <?php foreach ($allSectors as $sectorName): ?>
                    <option value= <?= $sectorName['id'] ?>> <?= $sectorName['name'] ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div id="containMessage">

            <h3>walouuu</h3>
        </div>


    </div>

</main>
