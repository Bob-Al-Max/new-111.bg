<pre>
   <?php  
    
   //print_r($mo); 
    $query = new yii\db\Query();
  $a=  $query->select('*')->from('questions')->all();
    
    
    print_r($a);
    ?>
</pre>

