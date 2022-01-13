<div class="p-5 table-responsive">
    <div class="table-caption">
        Categorie
    </div>
    <form action="utils/insert.php" method="get">
        <input type="hidden" name="codiceInsert" value="categoria">
        <table id="tbl_categorie" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th></th>
                </tr>
            </thead>
            <?php
            $cat = $dbh->get_categoria();
            foreach ($cat as $c) : ?>
                <tr>
                    <td><?php echo $c["Nome"]; ?></td>
                    <td><?php echo $c["Descrizione"]; ?></td>
                    <td> </td>
                </tr>
            <?php
            endforeach
            ?>
            <tr>
                <td>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
                </td>
                <td>
                    <textarea class="form-control gfx-not-resizable" name="desc" id="desc" placeholder="Descrizione" rows="3"> </textarea>
                </td>
                <td>
                    <button type="submit" class="custom-btn btn-grid-1">Inserisce</button>
                </td>
            </tr>
            <tbody>
            </tbody>
        </table>
    </form>
</div>