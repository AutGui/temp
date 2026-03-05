<?php
require_once __DIR__ . '/core/functions.php';

$title = 'TradTech · Martial Library CoreV5';
include __DIR__ . '/share/header.php';
?>

<a href="<?= h(url('Synthetics.php')) ?>" class="btn btn-outline-secondary btn-sm mb-3">&larr; Back to Synthetics</a>

<h1 class="title">TradTech Martial Library CoreV5</h1>

<div id="SyntheticBox">
    <div class="SyntheticInfo">
        <div class="Description">
            <div class="SyntheticTitles DescriptionTitle">Description</div>
            <span class="CompleteNameTitle">Complete Name</span>
            <br>
            <div class="CompleteName" style="margin-top: 20px;">Tradicional Technology’s Martial Library Core Version 5</div>
            <br>

            <div class="DescriptionText">
                Main chip used by martial artists.
                <br>
                Downloads a library software that allows the installation of martial arts, if the user downloads them. The program comes with a pre-installed martial art that betters the core technique of the user.
            </div>
        </div>

        <div class="Info">
            <div class="SyntheticTitles InfoTitle">Info</div>
            <div class="InfoBorder">
                <img src="Images/ArasakaShadow.png" class="DescriptionImage Images" alt="TradTech Martial Library CoreV5">

                <div class="Stats">
                    <div class="SyntheticTitles StatsTitle">Stats</div>
                    <div class="StatsText">
                        · Increases the hand-to-hand damage dealt by the user by <b style="color: #656cff;">25%</b>
                        <br>
                        · Allows the download of <b style="color: #656cff;">Martial Arts</b>
                    </div>
                    <div class="SyntheticTypes Types">Melee</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/share/footer.php'; ?>
