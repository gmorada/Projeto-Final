<h1>Alocar Professor para Turmas</h1>
<table class="tablesorter">
    <thead>
        <tr>
            <th>Código</th>
            <th>Disciplina</th>
            <th>Turma</th>
            <th>Cursos</th>
            <th>Módulo</th>
            <th>Segunda</th>
            <th>Terça</th>
            <th>Quarta</th>
            <th>Quinta</th>
            <th>Sexta</th>
            <th>Sábado</th>
            <th>Professor</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php
    foreach($crowds as $crowd)
    {
        $roomCrowdDateTimes = Doctrine::getTable('RoomCrowdDatetime')->findByCrowCdKey($crowd->getCrowCdKey());

        $monday = "";
        $tuesday = "";
        $wednesday = "";
        $thursday = "";
        $friday = "";
        $saturday = "";

        foreach($roomCrowdDateTimes as $roomCrowdDateTime)
        {
            switch($roomCrowdDateTime->getRocdNbWeekday())
            {
                case 1:
                    $monday .= $roomCrowdDateTime->getDetailedInformation()."<br>";
                    break;
                case 2:
                    $tuesday .= $roomCrowdDateTime->getDetailedInformation()."<br>";
                    break;
                case 3:
                    $wednesday .= $roomCrowdDateTime->getDetailedInformation()."<br>";
                    break;
                case 4:
                    $thursday .= $roomCrowdDateTime->getDetailedInformation()."<br>";
                    break;
                case 5:
                    $friday .= $roomCrowdDateTime->getDetailedInformation()."<br>";
                    break;
                default :
                    $saturday .= $roomCrowdDateTime->getDetailedInformation()."<br>";
            }
        }
    ?>
    <tr>
        <td><?php echo $crowd->Subject->getSubjNmCode(); ?></td>
        <td><?php echo $crowd->Subject->getSubjNmName(); ?></td>
        <td><?php echo $crowd ?></td>
        <td><?php echo $crowd->Subject->Course; ?></td>
        <td><?php echo $crowd->getCrowNbModule(); ?></td>
        <td><?php echo $monday; ?></td>
        <td><?php echo $tuesday; ?></td>
        <td><?php echo $wednesday; ?></td>
        <td><?php echo $thursday; ?></td>
        <td><?php echo $friday; ?></td>
        <td><?php echo $saturday; ?></td>
        <?php
            if($crowd->Teacher != "")
            {
            ?>
                <td><?php echo $crowd->Teacher; ?></td>
                <td><span class="edit"><a class="button" href="<?php echo url_for('TeacherCrowd/edit?crow_cd_key='.$crowd->getCrowCdKey()) ?>"></a></span></td>
                <td><span class="delete"><?php echo link_to(' ', 'TeacherCrowd/delete?crow_cd_key='.$crowd->getCrowCdKey(), array('class' => 'button','method' => 'delete', 'confirm' => 'Você tem certeza que deseja desalocar esse professor?')) ?></span></td>
            <?php
            }
            else
            {
            ?>
                <td></td>
                <td></td>
                <td><span class="new"><a class="button" href="<?php echo url_for('TeacherCrowd/new?crow_cd_key='.$crowd->getCrowCdKey()) ?>"></a></span></td>
            <?php
            }
        ?>
    </tr>
    <?php
    }
?>
    </tbody>
</table>