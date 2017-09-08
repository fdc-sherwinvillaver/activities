<?php  
App::uses('AppController','Controller');

/**
*  Posts Controller
*/
class PostsController extends AppController {

	/**
	*	Components
	*/

	public $components = array('Paginator');

	/**
	*	index method
	*/
	public function index() {
		$this->Post->recursive = 0;
		$this->set('posts', $this->Paginator->paginate());
	}

	/**
	*	view method
	*/
	public function view($id = null) {
		if(!$this->Post->exists($id)){
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.'.$thos->Post->primaryKey => $id));
		$this->set('post',$this->Post->find('first',$options));
	}

	/**
	*	add method
	*/
	public function add() {
		if($this->request->is('post')) {
			$this->Post->create();
			if($this->Post->save($this->request->data)) {
				$this->Session->setFlash(_('The post has been saved.'));
			}
			return $this->redirect(array('action' => 'index'));
		}
		else {
			$this->Session->setFlash(_('The post could not be saved. Please, try again'));
		}
	}

	/**
	*	update method
	*/
	public function edit($id = null) {
		if(!$this->Post->exsts($id)){
			throw new NotFoundException(_('Invalid post'));
		}
		if($this->request->is(array('post','put'))) {
			if($this->Post->save($this->request->data)) {
				$this->Session->setFlash(_('The post has bees saved'));
				return $this->redirect(array('action' => 'index'));
			}
			else {
				$this->Session->setFlash(_('The post could not be saved. Please, try again'));
			}
		}
		else {
			$options = array('conditions' => array('Post.'.$this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first',$options);
		}
	}

	/**
	*	delete method
	*/
	public function delete($id = null) {
		if(!$this->Post->exists($id)) {
			throw new NotFoundException(_('Invalid Post'));
		}
		$this->request->onlyAllow('post','delete');
		if($this->Post->delete()) {
			$this->Session->setFlash(_('The post has been deleted'));
		}
		else{
			$this->Session->setFlash(_('The post could not be deleted'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
?>