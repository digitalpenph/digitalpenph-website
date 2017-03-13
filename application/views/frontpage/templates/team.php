<section class="success" id="team">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2><?php echo $navigation[1]["Name"] ?></h2>
                <hr class="star-light">
            </div>
        </div>
        <div class="row row-centered">
            <?php foreach ($team as $value) { ?>
                <div class="col-sm-2 team-item col-centered">
                    <img src="<?php echo base_url($value["Image"]); ?>" class="img-responsive img-circle img-team">
                    <div class="caption">
                        <div class="caption-content text-center">
                            <b><?php echo $value["Name"] ?></b>
                            <?php echo $value["Position"] ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>