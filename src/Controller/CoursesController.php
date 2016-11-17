<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 */
class CoursesController extends AppController
{

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
    public function view($id)
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
                        $this->redirect(['action' => 'view', $i]);
                        
                    }
                    else{
                        $this->Flash->error(__('The course does not exist'));
                    }
                
                }
                
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
                    
                    for($i=1; $i<=345; $i++){
                    //create row object
                    $course = $this->Courses->get($i, ['contain' => ['Klasses']]);
                    $this->set('course', $course);
                    $this->set('_serialize', ['course']);
                   
                        
                    
                        //loop through classes
                        foreach($course->klasses as $klasses){
                        
                            
                        $days = str_replace('-','',$klasses->day); //Removes the '-' from days     
                           
                            
                            //filters by types
                            if($klasses->type . '' == 'Lec' ){
                                if(!$verifyLec){
                                    
                                }else{
                                    
                                }
                                    
                                
                            }   
                            
                            if($klasses->type . '' == 'Tut')
                            {
                                
                            }
                            
                            if($klasses->type . '' == 'Lab'){
                                
                            }
                            
                        }
                    
                    }
            }
            
            
        }   
    }  
}


//*********************LINKED LIST *******************************************************************************
class ListNode
{
    public $data;
    public $next;
    function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
    }

    function readNode()
    {
        return $this->data;
    }
}

class LinkList
{
    private $firstNode;
    private $lastNode;
    private $count;

    function __construct()
    {
        $this->firstNode = NULL;
        $this->lastNode = NULL;
        $this->count = 0;
    }

    //insertion at the start of linklist
    public function insertFirst($data)
    {
        $link = new ListNode($data);
        $link->next = $this->firstNode;
        $this->firstNode = &$link;

        /* If this is the first node inserted in the list
           then set the lastNode pointer to it.
        */
        if($this->lastNode == NULL)
            $this->lastNode = &$link;
            $this->count++;
    }


    //displaying all nodes of linklist
    public function readList()
    {
        $listData = array();
        $current = $this->firstNode;
        while($current != NULL)
        {
            array_push($listData, $current->readNode());
            $current = $current->next;
        }
        foreach($listData as $v){
            echo $v." ";
        }
    }

    //reversing all nodes of linklist
    public function reverseList()
    {
        if($this->firstNode != NULL)
        {
            if($this->firstNode->next != NULL)
            {
                $current = $this->firstNode;
                $new = NULL;

                while ($current != NULL)
                {
                    $temp = $current->next;
                    $current->next = $new;
                    $new = $current;
                    $current = $temp;
                }
                $this->firstNode = $new;
            }
        }
    }



    //deleting a node from linklist $key is the value you want to delete
    public function deleteNode($key)
    {
        $current = $this->firstNode;
        $previous = $this->firstNode;

        while($current->data != $key)
        {
            if($current->next == NULL)
                return NULL;
            else
            {
                $previous = $current;
                $current = $current->next;
            }
        }

        if($current == $this->firstNode)
         {
              if($this->count == 1)
               {
                  $this->lastNode = $this->firstNode;
               }
               $this->firstNode = $this->firstNode->next;
        }
        else
        {
            if($this->lastNode == $current)
            {
                 $this->lastNode = $previous;
             }
            $previous->next = $current->next;
        }
        $this->count--;  
    }


       //empty linklist
    public function emptyList()
    {
        $this->firstNode == NULL;

    }


    //insertion at index

    public function insert($NewItem,$key){
        if($key == 0){
        $this->insertFirst($NewItem);
    }
    else{
        $link = new ListNode($NewItem);
        $current = $this->firstNode;
        $previous = $this->firstNode;

        for($i=0;$i<$key;$i++)
        {       
                $previous = $current;
                $current = $current->next;
        }

           $previous->next = $link;
           $link->next = $current; 
           $this->count++;
    }

    }   
}
