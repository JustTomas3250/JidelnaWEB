<div>
    <h1 class="text-5xl">Všechna jídla</h1>

    <br>
    <br>

    <table class="m-auto border-collapse border border-gray-400 table-auto">
        <thead>
            <tr class="border border-gray-300">
                <th class="p-5 border border-gray-300">ID</th>
                <th class="p-5 border border-gray-300">Název</th>
                <th class="p-5 border border-gray-300">typ</th>
                <th class="p-5 border border-gray-300">popis</th>
                <th class="p-5 border border-gray-300">alergeny</th>
                <th class="p-5 border border-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['jidla'] as $jidlo) : ?>
                <tr class="border border-gray-300">
                    <td class="p-5 border border-gray-300"><?= $jidlo['id'] ?></td>
                    <td class="p-5 border border-gray-300"><?= $jidlo['nazev'] ?></td>
                    <td class="p-5 border border-gray-300"><?= $jidlo['typ'] ?></td>
                    <td class="p-5 border border-gray-300"><?= $jidlo['popis'] ?></td>
                    <td class="p-5 border border-gray-300"><?= $jidlo['alergeny'] ?></td>
                    <td class="p-5 border border-gray-300"><img src="<?= $jidlo['img']?>" class="w-30"></td>
                    <td class="p-5 border border-gray-300"><a href="Jidlo/id/<?= $jidlo['id']; ?>">View</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>