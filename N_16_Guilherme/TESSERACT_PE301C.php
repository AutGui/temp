<?php
require_once __DIR__ . '/core/functions.php';

$title = 'TESSERACT · PE301C';
include __DIR__ . '/share/header.php';
?>

<a href="<?= h(url('Synthetics.php')) ?>" class="btn btn-outline-secondary btn-sm mb-3">&larr; Back to Synthetics</a>

<h1 class="title">TESSERACT PE301C</h1>

<div id="SyntheticBox">
    <div class="SyntheticInfo">
        <div class="Description">
            <div class="SyntheticTitles DescriptionTitle">Description</div>
            <span class="CompleteNameTitle">Complete Name</span>
            <br>
            <div class="CompleteName">TESSERACT’s Pulse Enhancer 301 Capped</div>
            <br>

            <div class="DescriptionText">
                Increases the user’s instincts by sending extra electrical impulses that mix up with the natural electrical pulses of the brain, increasing the speed of which they get to the destination.
                <br>
                Also installs a compatibility system for acceleration synthetics and upgrades.
            </div>
        </div>

        <div class="Info">
            <div class="SyntheticTitles InfoTitle">Info</div>
            <div class="InfoBorder">
                <img src="Images/SandevistanApogee.png" class="DescriptionImage Images" alt="TESSERACT PE301C">

                <div class="Stats">
                    <div class="SyntheticTitles StatsTitle">Stats</div>
                    <div class="StatsText">
                        · Accelerates the user while in slow motion by <b style="color: #656cff;">25%</b>
                        <br>
                        · Allows the use of <b style="color: #656cff;">acceleration</b>-related synthetics and upgrades
                    </div>
                    <div class="SyntheticTypes Types">Acceleration</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/share/footer.php'; ?>
