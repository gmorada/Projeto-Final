<?php
    header("Content-type: application/msexcel");

    header("Content-Disposition: attachment; filename=quadro_horarios.xls");
?>

<table class="table table-striped">
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
                    <th>Juntada</th>
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
                $parent = Doctrine::getTable('Crowd')->findOneByCrowCdParent($crowd->getCrowCdKey());
                if($parent)
                {
                    $roomCrowdDateTimes = Doctrine::getTable('RoomCrowdDatetime')->findByCrowCdKey($parent->getCrowCdKey());
                
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
                }                
                $son  = $crowd->getCrowCdParent();
                if($son)
                {
                    $son = Doctrine::getTable('Crowd')->findOneByCrowCdKey($son);
                    $parent = $son;
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
                    <td><?php echo $crowd->Teacher; ?></td>
                    <td>
                        <?php
                        if($parent)
                        {
                            echo $parent->getCrowdName();
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
        ?>
            </tbody>
        </table>