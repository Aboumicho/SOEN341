<br>
<br>
<br>

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