<br>
<br>
<br>
<?php if(!$this->request->is('post')): ?>
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
    <div class="panel">
        <h2 class="text-center">Select your Courses</h2> <br>
        <?= $this->Form->create(); ?>
        <fieldset>
        
         
        <?= $this->Form->input(
        'code', array('type' => 'select', 'options' =>
                                            array(
                                            '' => '',
                                            'AERO' => 'AERO',
                                            'BCEE' => 'BCEE',
                                            'BLDG' => 'BLDG',
                                            'COMP' => 'COMP',
                                            'COEN' => 'COEN',
                                            'ELEC' => 'ELEC',
                                            'ENCS' => 'ENCS',
                                            'ENGR' => 'ENGR',
                                            'INDU' => 'INDU',
                                            'MECH' => 'MECH',
                                            'SOEN' => 'SOEN'
                                            )
                    )
        );?> <br>    
        <?= $this->Form->input('id') ;  ?> <br>
            
        <?= $this->Form->input('availabilities', array('type' => 'select',
                                                 'multiple'=>'multiple',
                                                 'options'=> array(
                                                'M' => 'Monday',
                                                'T' => 'Tuesday',
                                                'W' => 'Wednesday',
                                                'J' => 'Thursday',
                                                'F' => 'Friday',
                                                'S' => 'Saturday',
                                                'D' => 'Sunday'
                                                 )
                                                    
    
    
        )); ?>
        </fieldset>
            <?= $this->Form->submit('Search', array('class' => 'button')); ?>        
        <?= $this->Form->end(); ?> 
        <br>
        
    </div>
</div>
<?php endif; 
$i=0;
?>


<?php if($this->request->is('post')): ?>

<div class="related">
    
 <table cellpadding="0" cellspacing="0">
            
     <?php foreach($list as $l):
     /*
     if($i == 10)
     die($l);
     
     $i++;
     */
     ?>
     <tr>
                
                <td><?= h($l->id) ?></td>
                <td><?= h($l->code) ?></td>
                <td><?= h($l->name) ?></td>
                
                <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $l->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $l->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $l->id], ['confirm' => __('Are you sure you want to delete # {0}?', $l->id)]) ?>    
                </td>
            </tr>
     <?php endforeach; ?>
     
 </table>   
    
    
    
</div>

<?php endif; ?>