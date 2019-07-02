<main>
    <h1>F.A.Q</h1>
    <div class="containAllFaq">
        <?php foreach ($faqList as $faq):?>
        <button class="collapsible"><?=$faq["name"]. ':'. $faq["question"];?>  </button>
        <div class="content">
            <p><?=htmlentities($faq["answer"])?></p>
        </div>
        <?php endforeach; ?>
    </div>
</main>
