<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace paskuale75\widgets;
use \yii\bootstrap4\Alert as BootstrapAlert;
use \yii\bootstrap4\Widget;
/**
 * Alert widget renders a message from session flash for material alerts. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * ```php
 * \Yii::$app->getSession()->setFlash('error', '<b>Alert!</b> Danger alert preview. This alert is dismissable.');
 * ```
 *
 * Multiple messages could be set as follows:
 *
 * ```php
 * \Yii::$app->getSession()->setFlash('error', ['Error 1', 'Error 2']);
 * ```
 *
 * @author Julio C. Ramos <ramosisw@gmail.com>
 */
class Alert extends Widget {
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - $key is the name of the session flash variable
     * - $value is the array:
     *       - class of alert type (i.e. danger, success, info, warning)
     *       - icon for alert AdminLTE
     */
    // <div class="alert alert-success">
    //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                   <i class="material-icons">close</i>
    //                 </button>
    //                 <span>
    //                   <b> Success - </b> This is a regular notification made with ".alert-success"</span>
    //               </div>
    public $alertTypes = [
        'error' => [
            'class' => 'alert alert-danger',
            'icon' => ' <i class="material-icons">close</i>',
        ],
        'danger' => [
            'class' => 'alert alert-danger',
            'icon' => ' <i class="material-icons">close</i>',
        ],
        'success' => [
            'class' => 'alert alert-success',
            'icon' => '<i class="material-icons">close</i>',
        ],
        'info' => [
            'class' => 'alert alert-info',
            'icon' => '<i class="material-icons">close</i>',
        ],
        'warning' => [
            'class' => 'alert alert-warning',
            'icon' => '<i class="material-icons">close</i>',
        ],
    ];
    /**
     * @var array the options for rendering the close button tag.
     */
    public $closeButton = [];
    /**
     * Initializes the widget.
     * This method will register the bootstrap asset bundle. If you override this method,
     * make sure you call the parent implementation first.
     */
    public function init(){
        parent::init();
        $session = \Yii::$app->getSession();
        $flashes = $session->getAllFlashes();
        
        $appendCss = isset($this->options['class']) ? ' ' . $this->options['class'] : '';
        foreach ($flashes as $type => $data) {
            if (isset($this->alertTypes[$type])) {
                $data = (array) $data;
                foreach ($data as $message) {
                    
                    $this->options['class'] = $this->alertTypes[$type]['class'] . $appendCss;
                    $this->options['id'] = $this->getId() . '-' . $type;
                    echo BootstrapAlert::widget([
                            'body' => $this->alertTypes[$type]['icon'] . $message,
                            'closeButton' => $this->closeButton,
                            'options' => $this->options,
                        ]);
                }
                $session->removeFlash($type);
            }
        }
    }
}