<div>
    <h1>Všechna jídla</h1>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Název</th>
            <th>typ</th>
            <th>popis</th>
            <th>alergeny</th>
            <th colspan="3">Actions</th>
        </thead>

        <?php foreach ($data['jidla'] as $jidlo) : ?>
            <tr>
                <td><?= $jidlo['id'] ?></td>
                <td><?= $jidlo['nazev'] ?></td>
                <td><?= $jidlo['typ'] ?></td>
                <td><?= $jidlo['popis'] ?></td>
                <td><?= $jidlo['alergeny'] ?></td>
                <td><a href="jidlo/id/<?= $jidlo['id']; ?>">View</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>