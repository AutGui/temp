<?php
require_once __DIR__ . '/core/functions.php';

$title = 'TechnoGenesis · Synthetics (static)';
include __DIR__ . '/share/header.php';
?>

<h1 class="title">Synthetics</h1>

<div id="SyntheticsArea">

    <div class="Sections">

        <div class="SectionTitles">BOOT Chips</div>

        <div class="Synthetic">
            <div class="Types">Acceleration</div>
            <a href="<?= h(url('TESSERACT_PE301C.php')) ?>">
                <img src="<?= h(url('Images/SandevistanApogee.png')) ?>" class="Images" alt="TESSERACT PE301C">
            </a>
            <div class="names">
                <span class="brand">TESSERACT</span>
                <span class="model">PE301C</span>
            </div>
        </div>

        <div class="Synthetic">
            <div class="Types">Melee</div>
            <a href="<?= h(url('TradTech_Martial_Library_CoreV5.php')) ?>">
                <img src="<?= h(url('Images/ArasakaShadow.png')) ?>" class="Images" alt="TRADTECH Martial Library CoreV5">
            </a>
            <div class="names">
                <span class="brand">TRADTECH</span>
                <span class="model">Martial Library CoreV5</span>
            </div>
        </div>

        <div class="Synthetic">
            <div class="Types">Firearm</div>
            <a href="<?= h(url('TESSERACT_Firearm_Formula_L2.php')) ?>">
                <img src="<?= h(url('Images/BerserkC4.png')) ?>" class="Images" alt="TESSERACT Firearm Formula L2">
            </a>
            <div class="names">
                <span class="brand">TESSERACT</span>
                <span class="model">Firearm Formula L2</span>
            </div>
        </div>

    </div>


    <div class="Sections">

        <div class="SectionTitles">Spine: Cervical</div>
        <div class="Synthetic">
            <div class="Types">Acceleration</div>
            <a href="<?= h(url('TESSERACT_CRS6.php')) ?>">
                <img src="<?= h(url('Images/SynapticAccelerator.png')) ?>" class="Images" alt="TESSERACT CRS6">
            </a>
            <div class="names">
                <span class="brand">TESSERACT</span>
                <span class="model">CRS6</span>
            </div>
        </div>
    </div>


    <div class="Sections">

        <div class="SectionTitles">Spine: Vertebrae</div>
        <div class="Synthetic">
            <div class="Types">Acceleration</div>
            <a href="<?= h(url('LUCHSHAYA-TEKH_SSE4.php')) ?>">
                <img src="<?= h(url('Images/Kerenzikov.png')) ?>" class="Images" alt="LUCHSHAYA-TEKH SSE4">
            </a>
            <div class="names">
                <span class="brand">LUCHSHAYA-TEKH</span>
                <span class="model">SSE4</span>
            </div>
        </div>
    </div>


    <div class="Sections">

        <div class="SectionTitles">Lungs</div>
        <div class="Synthetic">
            <div class="Types">Melee</div>
            <a href="<?= h(url('TradTech_Warrior_Lungs.php')) ?>">
                <img src="<?= h(url('Images/PainDistributor.png')) ?>" class="Images" alt="TRADTECH Warrior Lungs">
            </a>
            <div class="names">
                <span class="brand">TRADTECH</span>
                <span class="model">Warrior Lungs</span>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/share/footer.php'; ?>
