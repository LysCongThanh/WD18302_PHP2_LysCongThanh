<h1>
    <?= $params['heading'] ?>
</h1>

<div class="row">

    <form action="/courses" method="get" class="mb-3">
        <div class="row">
            <div class="col-6">
                <input type="text" class="form-control" name="name">
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-primary mr-2">Find Course</button>
                <a href="/courses" class="btn btn-primary">All</a>
            </div>
        </div>
    </form>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
        </tr>
        </thead>
        <tbody>
        <?php if (count($params['courses']) > 0): ?>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($params['courses'] as $course): ?>
                    <tr>
                        <td><?= $course['id'] ?></td>
                        <td><?= $course['name'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">
                Không tìm thấy !
            </div>
        <?php endif; ?>

        </tbody>
    </table>
</div>