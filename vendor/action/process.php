<?php
if(isset($_POST['Calculate'])){{
    echo '<a href="../../index.php"><button>Назад</button></a><br>';
    $year = $_POST['year'];
    $this_year=2000;
    $table=0;
    $chair=0;
    $result=0;
    $month_list = array(
        1  => 'янв.',
        2  => 'фев.',
        3  => 'мар.',
        4  => 'апр.',
        5  => 'мая', 
        6  => 'июн.',
        7  => 'июл.',
        8  => 'авг.',
        9  => 'сен.',
        10 => 'окт.',
        11 => 'ноя.',
        12 => 'дек.'
    );
    while($this_year<=$year){
        $date = new DateTime("$this_year-01-01");
        if($chair==$table){
            while ($date->format('Y') == $this_year) {
                if ($date->format('N') == 5) {
                    if($date->format('d')%2==0){
                        $table++;
                    }
                    else{
                        echo $date->format('j').'-е '.$month_list[$date->format('n')].' '.$date->format('Y').', ';
                        $chair++;
                    }
                    $result++;
                }
                $date->modify('+1 day');
            }
        }
        else if($chair>$table){
            while ($date->format('Y') == $this_year) {
                if ($date->format('N') == 5) {
                    $difference=$chair-$table;
                    if($difference>0){
                        $table++;
                        --$difference;
                    }
                    else if($date->format('d')%2==0){
                        $table++;
                    }
                    else if($date->format('d')%2!=0){
                        echo $date->format('j').'-е '.$month_list[$date->format('n')].' '.$date->format('Y').', ';
                        $chair++;
                    }
                    $result++;
                }
                $date->modify('+1 day');
            }
        }
        else if($chair<$table){
            while ($date->format('Y') == $this_year) {
                if ($date->format('N') == 5) {
                    $difference=$table-$chair;
                    if($difference>0){
                        echo $date->format('j').'-е '.$month_list[$date->format('n')].' '.$date->format('Y').', ';
                        $chair++;
                        --$difference;
                    }
                    else if($date->format('d')%2==0){
                        $table++;
                    }
                    else if($date->format('d')%2!=0){
                        echo $date->format('j').'-е '.$month_list[$date->format('n')].' '.$date->format('Y').', ';
                        $chair++;
                    }
                    $result++;
                }
                $date->modify('+1 day');
            }
        }
        $this_year++;
    }
}}
?>