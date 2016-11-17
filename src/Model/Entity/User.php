<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;


class User extends Entity
{

public $name = 'User';
public $displayField = 'name';
    
public $validate = array (
'name' =>array(
        'Please enter your name.'=>array(
            
        )    
    ),

'username'=>array(
    'The username must be between 5 and 15 characters. '=>array(
        'rule'=>array('between',5,15),
        'message'=>'That username must be between 5 and 15 characters.'
        ),
    'That username has already been taken'=>array(
        'rule'=>'isUnique',
        'message'=>'That username has already been taken'
        )
    ),
    'email'=>array(
        'Valid email'=>array(
           'rule'=>array('email'),
            'message'=>'Invalid email'
            )
        )
    );
        
        
    
    

    
    
    
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected $_hidden = [
        'password'
    ];
    
    protected function _setPassword($password){
        return (new DefaultPasswordHasher)->hash($password);
    }
}
