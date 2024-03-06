<?php include VIEW .'common/head.tpl.php'; ?>
<?php include VIEW .'admin/navbar.tpl.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card-counter primary">
                    <i class="fa fa-trucks"></i>
                    <span class="count-numbers">12</span>
                    <span class="count-name">Cargas</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter danger">
                    <i class="fa fa-ticket"></i>
                    <span class="count-numbers">599</span>
                    <span class="count-name">Instances</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter success">
                    <i class="fa fa-database"></i>
                    <span class="count-numbers">6875</span>
                    <span class="count-name">Data</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter info">
                    <i class="fa fa-users"></i>
                    <span class="count-numbers">35</span>
                    <span class="count-name">Users</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include VIEW .'common/footer.tpl.php'; ?>
