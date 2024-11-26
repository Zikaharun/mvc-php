<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6 mx-auto">
            <form action="<?= BASEURL; ?>/task/search" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="search task..." name="keyword" id="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-secondary" id="btn-search">search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">

        <div class="col-6 mx-auto">

            <!-- button trigger modal -->
        <button type="button" class="btn btn-primary btn-add" data-bs-toggle="modal" data-bs-target="#formModal">
        Add new task
        </button>


            <h3 class="mt-3">List tasks</h3>
            <ul class="list-group tex-center">
                <?php foreach($data['tasks'] as $task) : ?>
                    <li class="list-group-item  ">
                        <?= $task['name_task']?>
                        <a href="<?= BASEURL; ?>/task/status/<?= $task['id_task'] ?>" class="badge 

                            <?= $task['status'] === 'todo' ? 'bg-primary' : 
                            ($task['status'] === 'proccess' ? 'bg-warning' : 
                            ($task['status'] === 'done' ? 'bg-success' : 'bg-secondary')) ?>

                             text-decoration-none float-end ms-1 modalStatus"

                            data-bs-toggle="modal"
                            data-bs-target="#formStatus" data-id="<?= $task['id_task'] ?>" ><?= $task['status']?></a>

                        <a href="<?= BASEURL; ?>task/detail/<?= $task['id_task'] ?>" class="badge bg-primary float-end ms-1 text-decoration-none" >detail</a>

                        <a href="<?= BASEURL; ?>task/delete/<?= $task['id_task'] ?>" class="badge bg-danger float-end me-1 text-decoration-none" onclick="return confirm('sure?');">delete</a>

                        <a href="<?= BASEURL; ?>task/edit/<?= $task['id_task'] ?>"
                         data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $task['id_task'] ?> "
                          data-name="<?= $task['name_task'] ?>" data-category="<?= $task['category'] ?>" data-notes="<?= $task['notes'] ?>"
                          class="badge bg-success float-end me-1 modalEdit text-decoration-none">edit</a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="<?= BASEURL; ?>task/add" method="post">
            <input type="hidden" name="id_task" id="id_task">
            <div class="form-group">
                <label for="name_task">name task: </label>
                <input type="text" name="name_task" id="name_task" class="form-control" placeholder="name task">
            </div>
            <div class="form-group">
                <label for="category">category: </label>
                <input type="text" name="category" id="category" class="form-control" placeholder="category">
            </div>
            <div class="form-group">
                <label for="notes">note: </label>
                <textarea name="notes" id="notes" placeholder="notes" class="form-control"></textarea>
            </div>
            </div>
            <div class="modal-footer ">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary ">Add new task</button>
            </div>
        </form>

    </div>
  </div>
</div>

<!-- Modal status-->
<div class="modal fade" id="formStatus" tabindex="-1" aria-labelledby="modalTitleStatus" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitleStatus">status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="<?= BASEURL; ?>task/editStatus" method="post">
            
            <input type="hidden" name="id_status" id="id_status" >
            <select class="form-select" name="status" id="status" multiple aria-label="multiple select example">
                <option value="Todo" class="text-center text-primary" selected>Todo</option>
                <option value="proccess" class="text-center text-warning">proccess</option>
                <option value="done" class="text-center text-success">done</option>
            </select>
     </div>
            <div class="modal-footerStatus modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary ">change</button>
            </div>
        </form>

    </div>
  </div>
</div>

<script>
// JavaScript untuk menangani pengisian form modal berdasarkan tombol Edit
document.addEventListener("DOMContentLoaded", function() {
    const editButtons = document.querySelectorAll('.modalEdit');
    editButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const notes = event.target.getAttribute('data-notes');


            document.getElementById('notes').value = notes;

            
        });
    });
});
</script>

