<section class="success" id="team">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2><?php echo $navigation[1]["Name"] ?></h2>
            </div>
        </div>
        <div class="row row-centered">
            <?php foreach ($team as $value) { ?>
                <div class="col-sm-4 team-item col-centered">
                    <img src="<?php echo base_url($value["Image"]); ?>" class="img-responsive img-circle img-team" onclick="image('<?php echo $value['Name']; ?>', '<?php echo $value['Description']; ?>')">
                    <div class="caption">
                        <div class="caption-content text-center">
                            <b><?php echo $value["Name"] ?></b>
                            <br />
                            <?php echo $value["Position"] ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- The Modal -->
<?php include 'modal.php' ?>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Get the modal id
    var modal_header = document.getElementById('modal-header');
    var modal_body = document.getElementById('modal-body');

    // When the user clicks the button, open the modal 
    function image(header, body) {
        modal.style.display = "block";
        modal_header.innerText = header;
        modal_body.innerText = body;
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>