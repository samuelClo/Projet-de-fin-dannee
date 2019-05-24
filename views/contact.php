<h3>walouuu</h3>
<?php var_dump($allSectors); ?>
<select id="contactSectors">
    <?php foreach ($allSectors as  $sectorName):?>
        <option value = <?=$sectorName['id']?> > <?=$sectorName['name']?> </option>
    <?php endforeach; ?>
</select>