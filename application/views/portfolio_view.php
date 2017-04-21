<h1>Портфоліо</h1>
<p>
<table class="table">
    Все проекты в следующей таблице являются вымышленными,
    поэтому даже не пытайтесь перейти по приведенным ссылкам.
    <thead>
        <tr>
            <td>Рік</td>
            <td>Проект</td>
            <td>Опис</td>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($data as $row)
    {
        echo '<tr>
                <td>'.$row->getYear() . '</td>
                <td>'.$row->getSite() . '</td>
                <td>'.$row->getDescription() . '</td>
              </tr>';
    }
    ?>
    </tbody>
</table>
</p>