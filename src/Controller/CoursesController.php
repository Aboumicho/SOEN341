<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**

 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 */
class CoursesController extends AppController
{

    public static $c;
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $courses = $this->paginate($this->Courses);

        $this->set(compact('courses'));
        $this->set('_serialize', ['courses']);
    }

    /**
     * View method
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id=6)
    {
        $course = $this->Courses->get($id, [
            'contain' => ['Klasses']
        ]);

        $this->set('course', $course);
        $this->set('_serialize', ['course']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $course = $this->Courses->newEntity();
        if ($this->request->is('post')) {
            $course = $this->Courses->patchEntity($course, $this->request->data);
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The course could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('course'));
        $this->set('_serialize', ['course']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $course = $this->Courses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $course = $this->Courses->patchEntity($course, $this->request->data);
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The course could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('course'));
        $this->set('_serialize', ['course']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $course = $this->Courses->get($id);
        if ($this->Courses->delete($course)) {
            $this->Flash->success(__('The course has been deleted.'));
        } else {
            $this->Flash->error(__('The course could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function choose(){
        if ($this->request->is('post')){
            
            
            
            //define variables
            $id = $this->request->data('id');
            $code = $this->request->data('code');
            $availabilities = $this->request->data('availabilities');
            $verifyLec = false;
            $verifyTut = false;
            $verifyLab = false;
            $existsLab = false;
            $existsTut = false;
            $list = array();
            $key=0;
            $q = 0;
            $coursefound = false;
            //search class by code 
            if($code != '' && $id != ''){
                
                for($i=1; $i <=345; $i++){
                    //get full code EX: COMP + 249 = COMP249
                    $code_class = $code . $id;
                    
                    //create row object
                    $course = $this->Courses->get($i, ['contain' => ['Klasses']]);
                    $this->set('course', $course);
                    $this->set('_serialize', ['course']);
                
                    //display chose class
                    if($course->code . '' == $code_class . ''){
                        $coursefound=true;
                        $this->redirect(['action' => 'view', $i]);
                        
                    }
                    
                
                }
                        if(!$coursefound)
                        $this->Flash->error(__('The course does not exist'));
                    
                
                
                
            } else if(($code == '' && $id != '') || ($code != '' && $id == ''))
                
            {
                $this->Flash->error(__('Please enter full course'));   
            }
            
            else{
                $avail = '';
               
                //write down a string of all availabilities
                foreach($availabilities as $a){
                $avail = $avail . $a;    
                }
                    //loops through courses
                    for($i=1; $i<=345; $i++){
                    //create row object
                    $course = $this->Courses->get($i, ['contain' => ['Klasses']]);
                    $this->set('course', $course);
                    $this->set('_serialize', ['course']);
                   
                    $verifyLec = false;
                    $verifyTut = false;
                    $verifyLab = false;
                    $existsLab = false;
                    $existsTut = false;
                        
                        
                        //loop through classes
                        foreach($course->klasses as $klasses){
                         
                        
                        $days = str_replace('-','',$klasses->day); //Removes the '-' from days     
                           
                            //filters by types
                            if(trim($klasses->type) == trim('Lec') ){
                                
                                if(!$verifyLec){
                                    
                                    if(strlen($avail) > strlen($days)){
                                    //if match is found
                                        if(preg_match('/' . trim($days) . '/', ''.$avail . '')){
                                           
                                            
                                             $verifyLec = true;
                                                      
                                        }                                         
                                    }
                                else if(strlen($days) > strlen($avail)){
                                        if(preg_match('/' . trim($avail) . '/', ''.$days . '')){
                                           $verifyLec = true;
                                        }  
                                        
                                    }
                                    else if(strlen($days) == strlen($avail)){
                                        if($days == $avail){
                                            $verifyLec = true;
                                        }
                                        
                                    }
                                }         
                            }   
                           
                            
                            if(trim($klasses->type) == trim('Tut') )
                            {
                                $existsTut = true;
                                if(!$verifyTut){
                                    
                                    if(strlen($avail) > strlen($days)){
                                    //if match is found
                                        if(preg_match('/' . trim($days) . '/', ''.$avail . '')){
                                           
                                            
                                            $verifyTut = true;
                                                         
                                        }                                         
                                    }
                                    else if(strlen($days) > strlen($avail)){
                                        if(preg_match('/' . trim($avail) . '/', ''.$days . '')){
                                           $verifyTut = true;
                                        }  
                                        
                                    }
                                    else if(strlen($days) == strlen($avail)){
                                        if($days == $avail){
                                            $verifyTut = true;
                                        }
                                        
                                    }
                                }
                            
                            
                            if(trim($klasses->type) == trim('Lab')){
                                $existsLab = true;
                                if(!$verifyLab){
                                    
                                    if(strlen($avail) > strlen($days)){
                                    //if match is found
                                        if(preg_match('/' . trim($days) . '/', ''.$avail . '')){
                                           $verifyLab = true;
                                        }     
                                    }
                                    else if(strlen($days) > strlen($avail)){
                                        if(preg_match('/' . trim($avail) . '/', ''.$days . '')){
                                           $verifyLab = true;
                                        }  
                                        
                                    }
                                    else if(strlen($days) == strlen($avail)){
                                        if($days == $avail){
                                            $verifyLab = true;
                                        }
                                        
                                    }
                                    
                                }
                                
                            }     
                        }
                    
                    $q = $i;    
                    }
                   
                    if(($verifyLab && $existsLab || !$verifyLab && !$verifyLab || 
                        !$verifyLab && $existsLab) && ($verifyTut && $existsTut || !$verifyTut
                        && !$verifyTut || 
                        !$verifyTut && $existsTut) && $verifyLec){
                            array_push($list, $course);
                        
                        
                    }
                        
                }
                $this->set('list', $list);
                
                $c = $this->Courses->newEntity();
                $c = $this->Courses->patchEntity($c, $list);
                
                
                
            }
            
            
        }   
    }
    
    
    
    
    
}
  

