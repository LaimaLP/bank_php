<!-- visur susidedam session starta, nes info pernesinejame is vieno psl i kita -->
<!-- rodom kazka tik jei yra nustatyta sesija success arba error, kitu atveju nesirodo niekas -->
<?php if (isset($_SESSION['success']) || isset($_SESSION['error'])) : ?> 
    <div class="container mt-5" data-remove-after="3" data-removable>
        <div class="row justify-content-center">
            <div class="col-4">
<!-- jeigu yra pasetintas successas, rodom. kai parodom successa, istrinam  -->
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_SESSION['success']; ?>
                    </div>
                    <?php unset($_SESSION['success']) ?>
                <?php endif; ?>

                <!-- atitinkamai jei pasetintas eroras, rodom eror -->
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_SESSION['error']; ?>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php endif ?>

