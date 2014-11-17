
<table class="footable table-datas" cellspacing="0" cellpadding="0" id="devicelist">
    <thead>
    <tr>        
        <th>Brand</th>
        <th>Device Category</th>
        <th>Homolog #</th>
        <th>Valid Until</th>
        <th>Model</th>
        <th>Comment</th>
    </tr>
    </thead>
    <tbody>
 <?
         $num = numrows($result);
         if ($num === false || $num == 0){?>
                <tr>
                    <td colspan="6" >No data found</td>
                </tr>
               <? exit; 
         }
        $rowindex = 0;
        $companyname = "";
        $description = "";
        $homologated = "";
        $clarification = 0;
        foreach ($result as $row) {
            $style_td = 'i'.$rowindex %2;
            $rowindex++;
            if($row['valid']==0){
                $homologated = " style='color:#ff0000;text-decoration:line-through;'";
                $clarification = 1;
            }
            else{
                $homologated = "";
            }
                
?>
<?
        if ($companyname != $row['Companyname'])
        {   
            if($rowindex > 1){
?>
            <tr style="background-color:#808080; height: 2px !important;">
                <td colspan="6" style="border-bottom:0px !important; border-top:0px !important">
            </tr>
            <tr>
<?
            }
?>
            <td class="<?= $style_td; ?>"><?=$row['Companyname'];?></td><?
            $companyname = $row['Companyname'];
            $description = "";
        }
        else{
            ?><tr><td class="<?= $style_td; ?>">&nbsp;</td><?
        }
        if ($description!= $row['Description'])
        {
            ?><td class="<?= $style_td; ?>"><?=$row['Description'];?></td><?
            $description = $row['Description'];
        }
        else{
            ?><td class="<?= $style_td; ?>">&nbsp;</td><?
        }
 ?>
                <td class="<?= $style_td; ?>" <?= $homologated; ?>><?=$row['Codex'];?></td>
                <td class="<?= $style_td; ?>" <?= $homologated; ?>><?=$row['untilseason'];?></td>
                <td class="<?= $style_td; ?>" <?= $homologated; ?>><?=$row['Devicemodel'];?></td>
                <td class="<?= $style_td; ?>" <?= $homologated; ?>><?=$row['Comments'];?></td>
           </tr>    
<?
        }
?>
    </tbody>
    </table>
<? if($clarification == 1){?>
    <p>Red items are no longer allowed devices</p>
<?}?>