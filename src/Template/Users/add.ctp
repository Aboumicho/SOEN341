<br>
<br>
<br>

<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
    <div class="panel">
        <h2 class="text-center">Create account</h2>  
            <?= $this->Form->create($user); ?>
                <fieldset>
                    <?php
                    echo $this->Form->input('email');
                    echo $this->Form->input('password', ['type' => 'password']);
                    echo $this->Form->input('confirm', ['type'=>'password']);
                    ?>
                    
                </fieldset>
        <?= $this->Form->button('Submit'); ?>
        <?= $this->Form->end(); ?>
    </div>
</div>