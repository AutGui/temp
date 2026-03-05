<?php
require_once __DIR__ . '/core/functions.php';

$title = 'TESSERACT · Firearm Formula L2';
include __DIR__ . '/share/header.php';
?>

<a href="<?= h(url('Synthetics.php')) ?>" class="btn btn-outline-secondary btn-sm mb-3">&larr; Back to Synthetics</a>

<h1 class="title">TESSERACT Firearm Formula L2</h1>

<div id="SyntheticBox">
    <div class="SyntheticInfo">
        <div class="Description">
            <div class="SyntheticTitles DescriptionTitle">Description</div>
            <span class="CompleteNameTitle">Complete Name</span>
            <br>
            <div class="CompleteName" style="margin-top: 20px;">TRASSERACT’s Firearm Formula License Lvl2</div>
            <br>

            <div class="DescriptionText">
                Only people with a firearms license Lvl2 can use this Main chip since it includes a sensor that gives synthetic and upgrade installation permissions to the user.
                <br>
                Modifying firearms without a firearms license Lvl2 or higher is prohibited by law.
                <br>
                Also includes a firearm detector program that removes the first limiter of the firearm (fire power limiter).
            </div>
        </div>

        <div class="Info">
            <div class="SyntheticTitles InfoTitle">Info</div>
            <div class="InfoBorder">
                <img src="Images/BerserkC4.png" class="DescriptionImage Images" alt="TESSERACT Firearm Formula L2">

                <div class="Stats">
                    <div class="SyntheticTitles StatsTitle">Stats</div>
                    <div class="StatsText">
                        · Increases the damage dealt by firearms by <b style="color: #656cff;">25%</b>
                        <br>
                        · Allows the installation of synthetics and upgrades on <b style="color: #656cff;">firearms</b>
                    </div>
                    <div class="SyntheticTypes Types">Firearm</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/share/footer.php'; ?>
