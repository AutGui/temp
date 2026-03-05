<?php
require_once __DIR__ . '/core/functions.php';

$title = 'TESSERACT · CRS6';
include __DIR__ . '/share/header.php';
?>

<a href="<?= h(url('Synthetics.php')) ?>" class="btn btn-outline-secondary btn-sm mb-3">&larr; Back to Synthetics</a>

<h1 class="title">TESSERACT CRS6</h1>

<div id="SyntheticBox">
    <div class="SyntheticInfo">
        <div class="Description">
            <div class="SyntheticTitles DescriptionTitle">Description</div>
            <span class="CompleteNameTitle">Complete Name</span>
            <br>
            <div class="CompleteName">TESSERACT’s Cervical Response System 6</div>
            <br>

            <div class="DescriptionText">
                Reaction Speed Enhancer which fetches at a very high price in the Open Market.
                <br>
                It is able to connect with most Main Chips by using the UDC (Universal Dampened Connection) Software as a Bridge to the Main Chip, ensuring safe usage.
                <br>
                The installation on the Cervical Spine allows for faster Spinal Reflexes and Reaction time.
            </div>
        </div>

        <div class="Info">
            <div class="SyntheticTitles InfoTitle">Info</div>
            <div class="InfoBorder">
                <img src="Images/SynapticAccelerator.png" class="DescriptionImage Images" alt="TESSERACT CRS6">

                <div class="Stats">
                    <div class="SyntheticTitles StatsTitle">Stats</div>
                    <div class="StatsText">
                        · Increases the slow down time percentage by <b style="color: #656cff;">5%</b>
                        <br>
                        · Increases the slow down time duration by <b style="color: #656cff;">1s</b>
                        <br>
                        · Works with any <b style="color: #656cff;">Non-Special</b> Main Chip
                    </div>
                    <div class="SyntheticTypes Types">Acceleration</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/share/footer.php'; ?>
