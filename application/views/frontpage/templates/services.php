<section class="success" id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>What We Do</h2>
            </div>
        </div>
        <hr class="success" />
        <div class="row row-centered">
            <?php foreach ($services as $value) { ?>
                <div class="col-sm-4 team-item col-centered">
                    <img src="<?php echo base_url($value["Image"]); ?>" class="img-responsive img-circle img-services">
                    <div class="caption">
                        <div class="caption-content text-center">
                            <p><b><?php echo $value["Name"] ?></b>
                            <br />
                            <?php echo $value["Description"] ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>