<?php
require_once __DIR__ . '/core/functions.php';

$title = 'LUCHSHAYA-TEKH · SSE4';
include __DIR__ . '/share/header.php';
?>

<a href="<?= h(url('Synthetics.php')) ?>" class="btn btn-outline-secondary btn-sm mb-3">&larr; Back to Synthetics</a>

<h1 class="title">LUCHSHAYA-TEKH SSE4</h1>

<div id="SyntheticBox">
    <div class="SyntheticInfo">
        <div class="Description">
            <div class="SyntheticTitles DescriptionTitle">Description</div>
            <span class="CompleteNameTitle">Complete Name</span>
            <br>
            <div class="CompleteName" style="margin-top: 0px;">
                LUCHSHAYA-TEKH’s Sensory Signal Enhancer 4
                <br>
                (LUCHSHAYA-TEK; Лучшая техн; BEST TECH)
            </div>
            <br>

            <div class="DescriptionText">
                Synthetic built by Russian's sweat and tears, this monster of a metal is placed right between each single one of your vertebrae, a painful procedure at that, be glad you aren’t one of our Russian friends that needed to test this monstrosity until it was safe.
                <br>
                This synthetic enhances the speed in which the spinal cord processes involuntary and fast reflexes, meaning that as soon as you are going to get hit, that information doesn’t even need to go to the brain, it’s almost instantly processed.
            </div>
        </div>

        <div class="Info">
            <div class="SyntheticTitles InfoTitle">Info</div>
            <div class="InfoBorder">
                <img src="Images/Kerenzikov.png" class="DescriptionImage Images" alt="LUCHSHAYA-TEKH SSE4">

                <div class="Stats">
                    <div class="SyntheticTitles StatsTitle">Stats</div>
                    <div class="StatsText">
                        · Turns on slow motion <b style="color: #656cff;">automatically</b> when the player is going to get <b style="color: #656cff;">hit</b>
                        <br>
                        · Slow motion has the duration of <b style="color: #656cff;">1.6s</b>
                    </div>
                    <div class="SyntheticTypes Types">Acceleration</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/share/footer.php'; ?>
