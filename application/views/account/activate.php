<!--Content Block-->
<section class="content-wrapper">
    <div class="content-container container">
        <div class="main">
            <h1 class="page-title">Activeren</h1>
            <div class="fieldset">
                <?php if ($activate == "0") { ?>
                <div class="success" style="display: inherit">
                    Uw account is geactiveerd! <br/>
                    U kunt meteen beginnen met winkelen!
                </div>
                <?php } else if ($activate == "1") { ?>
                <div class="error" style="display: inherit">
                    Uw account is al geactiveerd!
                </div>
                <?php } else if ($activate == "2") { ?>
                <div class="error" style="display: inherit">
                    Oeps er is iets mis gegaan! <br />
                    Probeer het later nog eens
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</section>
</div>