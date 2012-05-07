<?php
/**
 * 后台控制器抽象
 * 
 * @author 不会飞的羊
 */
class Controller extends CController {
	public function filters() {
        return array(
            'AuthorityControl',
        );
	}
    
	/**
	 * 安全过滤
	 */
    public function filterAuthorityControl($chain) {
        if(Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->baseUrl.'/login');
        } else {
            $me = Yii::app()->cache->get('cache-backend-by-username-'.Yii::app()->user->name);
            if($me===false) {
                $me = User::model()->find(array(
                    'condition' => 'username=:username',
                    'params' => array(
                        'username' => Yii::app()->user->name
                    )
                ));
                Yii::app()->cache->set('cache-backend-by-username-'.Yii::app()->user->name, $me, 3600);
            }
            if ($me->manager == 'Y') {
                $this->redirect(Yii::app()->baseUrl.'/login'); return;
            } else {
                $chain->run();
            }
        }
    }
}
