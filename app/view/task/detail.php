<div class="container mt-5">

    <div class="row" >
        <div class="col-md-6 mx-auto">
            <h3 class="text-center">Detail task.</h3>
            <div class="card mt-5 p-5 text-center">
                <p class="text-end text-muted fw-bold fs-6"><?= $data['tasks']['created_at']?></p>
                <h5 class="card-title">task: <?= $data['tasks']['name_task']?></h5>
                <h6 class="card-subtitle mb-2 text-light fw-bold mt-5 btn <?= $data['tasks']['category'] ==='important' ? 'bg-danger' : 'bg-primary' ?>">Category: <?= $data['tasks']['category'] ?></h6>

                <p class="card-text mt-3 py-2 badge <?= $data['tasks']['status'] === 'todo' ? 'bg-primary' : 
                            ($data['tasks']['status'] === 'proccess' ? 'bg-warning' : 
                            ($data['tasks']['status'] === 'done' ? 'bg-success' : 'bg-secondary')) ?>">
                            Status: <?= $data['tasks']['status']?>
                </p>
                <?php if($data['tasks']['status'] === 'done') : ?>
                    <figcaption class="blockquote-footer">
                        Has been finished at <cite title="Source Title"><?= $data['tasks']['date']?></cite>
                    </figcaption>
                <?php endif; ?>
                <p>
                <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Notes
                </button>
                </p>
                <div class="collapse" id="collapseExample">
                <div class="card card-body fst-italic text-secondary fw-bold">
                   '<?= $data['tasks']['notes'] ?>' 
                </div>
                </div>



            </div>
        </div>
    </div>
</div>