<?php
require_once __DIR__ . '/core/functions.php';

$title = 'TradTech · Warrior Lungs';
include __DIR__ . '/share/header.php';
?>

<a href="<?= h(url('Synthetics.php')) ?>" class="btn btn-outline-secondary btn-sm mb-3">&larr; Back to Synthetics</a>

<h1 class="title">TradTech Warrior Lungs</h1>

<div id="SyntheticBox">
    <div class="SyntheticInfo">
        <div class="Description">
            <div class="SyntheticTitles DescriptionTitle">Description</div>
            <span class="CompleteNameTitle">Complete Name</span>
            <br>
            <div class="CompleteName">Traditional Technology’s Warrior Lungs</div>
            <br>

            <div class="DescriptionText">
                TradTech is all about keeping it organic, just with some slight improvements.
                <br>
                This synthetic increases how much air the lungs can take by modifying them with the newest TradTech’s MetalGanic Fiber. This new material also enhances the way the user breathes allowing for complicated movements that require precise breathing, amongst many other things.
            </div>
        </div>

        <div class="Info">
            <div class="SyntheticTitles InfoTitle">Info</div>
            <div class="InfoBorder">
                <img src="Images/PainDistributor.png" class="DescriptionImage Images" alt="TradTech Warrior Lungs">

                <div class="Stats">
                    <div class="SyntheticTitles StatsTitle">Stats</div>
                    <div class="StatsText">
                        · Decreases the cooldown for Melee Attacks by <b style="color: #656cff;">25%</b>
                        <br>
                        · Decreases the cooldown for Special Melee Attacks by <b style="color: #656cff;">50%</b>
                        <br>
                        · Holding the dash button increases the <b style="color: #656cff;">distance</b> of dash by time held. Maxes out at <b style="color: #656cff;">200%</b> (4s)
                    </div>
                    <div class="SyntheticTypes Types">Melee</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/share/footer.php'; ?>
